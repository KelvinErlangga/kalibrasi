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


// User routes with RESTful conventions
Route::prefix('user')->name('user.')->group(function () {
    Route::get('/', [TambahUserController::class, 'index'])->name('index'); // Menampilkan daftar user
    Route::get('/create', [TambahUserController::class, 'create'])->name('create'); // Form untuk tambah user
    Route::post('/', [TambahUserController::class, 'store'])->name('store'); // Menyimpan user baru
    Route::get('/{id}', [TambahUserController::class, 'show'])->name('show'); // Menampilkan detail user
    Route::get('/{id}/edit', [TambahUserController::class, 'edit'])->name('edit'); // Form untuk edit user
    Route::put('/{id}', [TambahUserController::class, 'update'])->name('update'); // Mengupdate user
    Route::delete('/{id}', [TambahUserController::class, 'hapus'])->name('hapus');
});

// User routes with RESTful conventions
Route::prefix('jenisinstansi')->name('jenisinstansi.')->group(function () {
    Route::get('/', [JenisInstansiController::class, 'index'])->name('index'); // Menampilkan daftar user
    Route::get('/create', [JenisInstansiController::class, 'create'])->name('create'); // Form untuk tambah user
    Route::post('/', [JenisInstansiController::class, 'store'])->name('store'); // Menyimpan user baru
    Route::get('/{id}', [JenisInstansiController::class, 'show'])->name('show'); // Menampilkan detail user
    Route::get('/{id}/edit', [JenisInstansiController::class, 'edit'])->name('edit'); // Form untuk edit user
    Route::put('/{id}', [JenisInstansiController::class, 'update'])->name('update'); // Mengupdate user
    Route::delete('/{id}', [JenisInstansiController::class, 'destroy'])->name('destroy');
});


// User routes with RESTful conventions
Route::prefix('jenisalat')->name('jenisalat.')->group(function () {
    Route::get('/', [JenisInstansiController::class, 'index'])->name('index'); // Menampilkan daftar user
    Route::get('/create', [JenisInstansiController::class, 'create'])->name('create'); // Form untuk tambah user
    Route::post('/', [JenisInstansiController::class, 'store'])->name('store'); // Menyimpan user baru
    Route::get('/{id}', [JenisInstansiController::class, 'show'])->name('show'); // Menampilkan detail user
    Route::get('/{id}/edit', [JenisInstansiController::class, 'edit'])->name('edit'); // Form untuk edit user
    Route::put('/{id}', [JenisInstansiController::class, 'update'])->name('update'); // Mengupdate user
    Route::delete('/{id}', [JenisInstansiController::class, 'destroy'])->name('destroy');
});

// User routes with RESTful conventions
Route::prefix('instansi')->name('instansi.')->group(function () {
    Route::get('/', [InstansiController::class, 'index'])->name('index');
    Route::get('/create', [InstansiController::class, 'create'])->name('create');
    Route::post('/', [InstansiController::class, 'store'])->name('store');
    Route::get('/{id}', [InstansiController::class, 'show'])->name('show');
    Route::get('/{id}/edit', [InstansiController::class, 'edit'])->name('edit');
    Route::put('/{id}', [InstansiController::class, 'update'])->name('update');
    Route::delete('/{id}', [InstansiController::class, 'destroy'])->name('destroy');
});

// User routes with RESTful conventions
Route::prefix('kategorialat')->name('kategorialat.')->group(function () {
    Route::get('/', [KategoriAlatController::class, 'index'])->name('index');
    Route::get('/create', [KategoriAlatController::class, 'create'])->name('create');
    Route::post('/', [KategoriAlatController::class, 'store'])->name('store');
    Route::get('/{id}', [KategoriAlatController::class, 'show'])->name('show');
    Route::get('/{id}/edit', [KategoriAlatController::class, 'edit'])->name('edit');
    Route::put('/{id}', [KategoriAlatController::class, 'update'])->name('update');
    Route::delete('/{id}', [KategoriAlatController::class, 'destroy'])->name('destroy');
});