<?php

use App\Http\Controllers\InstansiController;
use App\Http\Controllers\JenisAlatController;
use App\Http\Controllers\JenisInstansiController;
use App\Http\Controllers\KategoriAlatController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route Halaman Utama
Route::get('/', function () {
    return view('layouts.master');
});

// Route Layout Master untuk Testing
Route::get('/sna', function () {
    return view('layouts.master');
});

Route::get('/sna/dashboard', function () {
    return view('sna.dashboard');
});

// Route untuk SNA
Route::get('/sna/{section}', function ($section) {
    switch ($section) {
        case 'dashboard':
            return view('sna.dashboard');
        default:
            abort(404);
    }
})->name('sna');

Route::resource('instansi', InstansiController::class);
Route::resource('jenis_instansi', JenisInstansiController::class);
Route::resource('jenis_alat', JenisAlatController::class);
Route::resource('kategori_alat', KategoriAlatController::class);
