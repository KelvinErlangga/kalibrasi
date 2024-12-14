<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InstansiController;
use App\Http\Controllers\JenisAlatController;
use App\Http\Controllers\JenisInstansiController;
use App\Http\Controllers\KategoriAlatController;
use App\Http\Controllers\TambahUserController;
use Illuminate\Support\Facades\Route;


Route::get('/dashboard', [DashboardController::class, 'index'])->name('sna.dashboard');

Route::resource('instansi', InstansiController::class);
Route::resource('jenis_instansi', JenisInstansiController::class);
Route::resource('jenis_alat', JenisAlatController::class);
Route::resource('kategori_alat', KategoriAlatController::class);
Route::resource('tambah_user', TambahUserController::class);

Route::get('/auth/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/auth/login', [AuthController::class, 'login']);

Route::view('/add_instansi', 'form.add_instansi')->name('add_instansi');

Route::prefix('user')->group(function () {
    Route::get('/', [TambahUserController::class, 'index'])->name('user.index');
    Route::get('/create', [TambahUserController::class, 'create'])->name('user.create');
    Route::post('/', [TambahUserController::class, 'store'])->name('user.store');
    Route::get('/{id}', [TambahUserController::class, 'show'])->name('user.show');
    Route::get('/{id}/edit', [TambahUserController::class, 'edit'])->name('user.edit');
    Route::put('/{id}', [TambahUserController::class, 'update'])->name('user.update');
    Route::delete('/{id}', [TambahUserController::class, 'hapus'])->name('user.hapus');
});