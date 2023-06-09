<?php

namespace App\Http\Controllers;

use App\Models\Votting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KotaksuaraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kotaksuara = DB::table('vottings as c')
            ->join('users as a', 'a.id', '=', 'c.user_id')
            ->join('kandidats as b', 'b.id', '=', 'c.kandidat_id')
            ->select('a.name as nama_pemilih', 'b.pasangan_kandidat', 'c.created_at', 'c.updated_at')
            ->get();
            
        return view('kotaksuara.kotaksuara_index', compact('kotaksuara'));
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
        //
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
