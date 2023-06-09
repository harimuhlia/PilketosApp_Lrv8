<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $listPemilih = User::all();
        $countKandidat  = DB::table('kandidats')->count();
        $countPemilih   = DB::table('users')->count();
        $countSudahMemilih = DB::table('users')
            ->where('users.status', '=', 'SUDAH')
            ->get()
            ->count();
            
        $countBelumMemilih    = DB::table('users')
            ->where('users.status', '=', 'BELUM')
            ->get()
            ->count();

        $chartResults = DB::table('vottings as a')
            ->join('kandidats as b', 'b.id', '=', 'a.kandidat_id')
            ->select('b.foto_pasangan', 'b.pasangan_kandidat', DB::raw('count(*) as count'))
            ->groupBy('a.kandidat_id')
            ->get();
        return view('home', compact('chartResults', 'listPemilih', 'countKandidat', 'countPemilih', 'countSudahMemilih', 'countBelumMemilih'));
    }
}
