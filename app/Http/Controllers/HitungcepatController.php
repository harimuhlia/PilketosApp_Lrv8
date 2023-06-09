<?php

namespace App\Http\Controllers;

use App\Models\Kandidat;
use App\Models\User;
use App\Models\Votting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HitungcepatController extends Controller
{
    public function index()
    {
        $totalpemilih = DB::table('vottings')->count();
        $totalKandidat  = DB::table('kandidats')->count();

        $userpemilih = DB::table('users')->count();
        $hitungSudahMemilih = DB::table('users')
            ->where('users.status', '=', 'SUDAH')
            ->get()
            ->count();
            
        $hitungBelumMemilih = DB::table('users')
            ->where('users.status', '=', 'BELUM')
            ->get()
            ->count();
        
        $jumlah = count(Votting::all());
        $results = DB::table('vottings as a')
            ->join('kandidats as b', 'b.id', '=', 'a.kandidat_id')
            ->select('b.foto_pasangan', 'b.pasangan_kandidat', DB::raw('count(*) as count'))
            ->groupBy('a.kandidat_id')
            ->get();
        return view('hitungcepat.hitungcepat_index', compact('userpemilih', 'jumlah', 'totalpemilih', 'hitungSudahMemilih', 'hitungBelumMemilih', 'totalKandidat', 'results'));
    }
}
