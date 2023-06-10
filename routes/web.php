<?php

use App\Http\Controllers\KandidatController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\KotaksuaraController;
use App\Http\Controllers\PemilihController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\VottingController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//----- Hitung Cepat Controller ------//
Route::get('/quickcount', [App\Http\Controllers\HitungcepatController::class, 'index'])->name('quickcount');

Route::middleware(['auth', 'ceklevel:Administrator,Pemilih'])->group(function () {
    Route::resource('profilpengguna', ProfilController::class);
    Route::resource('vottingkandidat', VottingController::class);
});

Route::middleware(['auth', 'ceklevel:Administrator'])->group(function () {
    Route::resource('kandidat', KandidatController::class);
    Route::resource('datakelas', KelasController::class);
    Route::resource('datapemilih', PemilihController::class);
    Route::resource('kotaksuara', KotaksuaraController::class);
});
