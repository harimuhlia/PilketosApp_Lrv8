<?php

namespace App\Http\Controllers;

use App\Models\Kandidat;
use App\Models\User;
use App\Models\Votting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VottingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kandidat= Kandidat::all();
        return view('biliksuara.votting_index', compact('kandidat'));
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
        Auth::user()->id;
        Votting::create([
            'user_id' => $request->user_id,
            'kandidat_id' => $request->kandidat_id
            ]);
            
            User::find($request->user_id)->update([
            'status' => "SUDAH"
            ]);

        return redirect()->route('vottingkandidat.index')->with('success', 'Anda sudah memilih');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $kandidat= Kandidat::find($id);
        return view('biliksuara.detail_visimisi', compact('kandidat'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
