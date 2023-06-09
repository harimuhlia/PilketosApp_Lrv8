<?php

namespace App\Http\Controllers;

use App\Models\Kandidat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class KandidatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kandidat = Kandidat::all();
        return view('master.kandidat.kandidat_index', compact('kandidat'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $kandidat= New Kandidat();
        // $kandidat->user_id=Auth::user()->id;
        $kandidat->pasangan_kandidat=$request->get('pasangan_kandidat');
        $kandidat->keterangan=$request->get('keterangan');
        $kandidat->visi_kandidat=$request->get('visi_kandidat');
        $kandidat->misi_kandidat=$request->get('misi_kandidat');
        if($request->hasFile('foto_pasangan'))
        {
            $file = $request->file('foto_pasangan');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('fotopasangan/', $filename);
            $kandidat->foto_pasangan = $filename;
        }
        $kandidat->save();

        return redirect()->route('kandidat.index')->with('success', 'Alhamdulillah Berhasil Dibuat');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $kandidat = Kandidat::find($id);
        $kandidat->pasangan_kandidat=$request->get('pasangan_kandidat');
        $kandidat->keterangan=$request->get('keterangan');
        $kandidat->visi_kandidat=$request->get('visi_kandidat');
        $kandidat->misi_kandidat=$request->get('misi_kandidat');
        if($request->hasFile('foto_pasangan'))
        {
            $destination = 'fotopasangan/'.$kandidat->foto_pasangan;
            if(File::exists($destination))
            {
                File::delete($destination);
            }
            $file = $request->file('foto_pasangan');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('fotopasangan/', $filename);
            $kandidat->foto_pasangan = $filename;
        }
        $kandidat->update();
        
        return redirect()->back()->with('success', 'Alhamdulillah Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // $kandidat = Kandidat::findOrFail($id);
        // $kandidat->delete();

        $kandidat = Kandidat::find($id);
        $destination = 'fotopasangan/'.$kandidat->foto_pasangan;
            if(File::exists($destination))
            {
                File::delete($destination);
            }
        $kandidat->delete();
        return redirect()->back()->with('success', 'Alhamdulillah Berhasil Dihapus');
    }
}
