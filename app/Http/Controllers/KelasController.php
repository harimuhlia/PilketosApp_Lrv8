<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datakelas = Kelas::all();
        return view('master.kelas.kelas_index', compact('datakelas'));
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
        $request->validate([
            'kode_kelas'=>'required|unique:kelas|min:2',
            'nama_kelas'=>'required',
        ]);
        $datakelas = New Kelas;
        $datakelas->kode_kelas=$request->get('kode_kelas');
        $datakelas->nama_kelas=$request->get('nama_kelas');
        $datakelas->save();
        
        return redirect()->back()->with('success', 'Alhamdulillah Berhasil Dibuat');
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
        Kelas::find($id)
            ->update($request->all());
        
        return redirect()->back()->with('success', 'Alhamdulillah Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $datakelas = Kelas::findOrFail($id);
        $datakelas->delete();
        return redirect()->back()->with('success', 'Alhamdulillah Berhasil Dihapus');
    }
}
