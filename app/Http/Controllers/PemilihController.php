<?php

namespace App\Http\Controllers;

use App\Imports\PemilihImport;
use App\Models\Kelas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Maatwebsite\Excel\Facades\Excel;

class PemilihController extends Controller
{
    /**
     * Display a listing of the resource.
     */
//     public function index(Request $request)
// {
//     $kelaspemilih = Kelas::all();
//     $pagination  = 10;
//     $pemilih    = User::when($request->keyword, function ($query) use ($request) {
//         $query
//         ->where('name', 'like', "%{$request->keyword}%");
//     })->orderBy('created_at', 'desc')->paginate($pagination);

//     $pemilih->appends($request->only('keyword'));

//     return view('master.pemilih.pemilih_index', compact('pemilih', 'kelaspemilih'));
//  }

    public function index()
    {
        $kelaspemilih = Kelas::all();
        $pemilih = User::all();
        // $pemilih = User::paginate(5);

        return view('master.pemilih.pemilih_index', compact('pemilih', 'kelaspemilih'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kelaspemilih = Kelas::all();
        $pemilih = User::all();
        return view('master.pemilih.pemilih_tambah', compact('pemilih', 'kelaspemilih'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'      => 'required',
            'email'     => 'required|email|unique:users',
            'password'  => 'required',
            'name'=>'required',
            'nis'=>'required|unique:users|min:2',
        ]);

        $pemilih= New User();
        $pemilih->name=$request->get('name');
        $pemilih->nis=$request->get('nis');
        $pemilih->kelas=$request->get('kelas');
        $pemilih->email=$request->get('email');
        $pemilih->roles=$request->get('roles');
        $pemilih->status=$request->get('status');
        $pemilih->password =Hash::make($request['password']);
        $pemilih->save();
        
        return redirect('/datapemilih')->with('success', 'Alhamdulillah Berhasil Dibuat');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pemilih = User::findOrFail($id);
        return view('master.pemilih.pemilih_show', compact('pemilih'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $kelaspemilih = Kelas::all();
        $pemilih = User::findOrFail($id);
        return view('master.pemilih.pemilih_edit', compact('pemilih', 'kelaspemilih'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if ($request->password) {
        User::find($id)->update([
        'name' => $request->name,
        'email' => $request->email,
        'roles' => $request->roles,
        'nis' => $request->nis,
        'kelas' => $request->kelas,
        'status' => $request->status,
        'password' => Hash::make($request->password)
        ]);
        } else {
        User::find($id)->update([
        'name' => $request->name,
        'email' => $request->email,
        'roles' => $request->roles,
        'nis' => $request->nis,
        'kelas' => $request->kelas,
        'status' => $request->status,
        ]);
        }

        return redirect('/datapemilih')->with('success', 'Alhamdulillah Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pemilih = User::find($id);
        $pemilih->delete();

        return redirect()->back()->with('success', 'Alhamdulillah Berhasil Dihapus');
    }

    public function importexcel(Request $request) 
	{
        try {
            // validasi
		$this->validate($request, [
			'file' => 'required|mimes:csv,xls,xlsx'
		]);
 
		// menangkap file excel
		// $file = $request->file('file');
 
		// membuat nama file unik
		// $nama_file = rand().$file->getClientOriginalName();
 
		// upload ke folder file pemilih di dalam folder public
		// $file->move('data_pemilih',$nama_file);
 
		// import data
        Excel::import(new PemilihImport, $request->file('file'));
		// Excel::import(new PemilihImport, public_path('/data_pemilih/'.$nama_file));

        return redirect()->back()
            ->with('success', 'Import data Pemilih berhasil.');
        } catch (ValidationException $e) {
            //throw $th;
            return back()->withErrors($e->getMessage())->withInput();
        }
	}

}
