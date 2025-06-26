<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

// Route untuk halaman welcome
Route::get('/', [App\Http\Controllers\HomeController::class, 'welcome'])->name('home');

// Auth routes (login, register, dll)
Auth::routes();

// Route untuk redirect setelah login berdasarkan role
Route::get('/redirect-after-login', [App\Http\Controllers\HomeController::class, 'redirectAfterLogin'])
    ->name('redirect.after.login')
    ->middleware('auth');

// ADMIN ROUTES (hanya untuk admin)
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    // Dashboard Admin
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'adminDashboard'])->name('dashboard');

    // Kategori CRUD - Admin bisa semua operasi
    Route::get('/kategori', [App\Http\Controllers\KategoriController::class, 'index'])->name('daftarKategori');
    Route::get('/kategori/create', [App\Http\Controllers\KategoriController::class, 'create'])->name('createKategori');
    Route::post('/kategori/create', [App\Http\Controllers\KategoriController::class, 'store'])->name('storeKategori');
    Route::get('/kategori/{kategori}/edit', [App\Http\Controllers\KategoriController::class, 'edit'])->name('editKategori');
    Route::put('/kategori/{kategori}', [App\Http\Controllers\KategoriController::class, 'update'])->name('updateKategori');
    Route::get('/kategori/{kategori}/delete', [App\Http\Controllers\KategoriController::class, 'destroy'])->name('deleteKategori');

    // Buku CRUD - Admin bisa semua operasi
    Route::get('/buku', [App\Http\Controllers\BukuController::class, 'index'])->name('daftarBuku');
    Route::get('/buku/create', [App\Http\Controllers\BukuController::class, 'create'])->name('createBuku');
    Route::post('/buku/create', [App\Http\Controllers\BukuController::class, 'store'])->name('storeBuku');
    Route::get('/buku/{buku}/edit', [App\Http\Controllers\BukuController::class, 'edit'])->name('editBuku');
    Route::put('/buku/{buku}', [App\Http\Controllers\BukuController::class, 'update'])->name('updateBuku');
    Route::get('/buku/{buku}/delete', [App\Http\Controllers\BukuController::class, 'destroy'])->name('deleteBuku');
});

// USER ROUTES (hanya untuk user biasa)
Route::middleware(['auth', 'user'])->prefix('user')->name('user.')->group(function () {
    // Dashboard User
    Route::get('/dashboard', [App\Http\Controllers\UserController::class, 'dashboard'])->name('dashboard');

    // User hanya bisa view/read data - tidak ada create, edit, delete
    Route::get('/kategori', [App\Http\Controllers\UserController::class, 'viewKategori'])->name('daftarKategori');
    Route::get('/buku', [App\Http\Controllers\UserController::class, 'viewBuku'])->name('daftarBuku');
});

// Backward compatibility routes - redirect ke route yang sesuai berdasarkan role
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'redirectToDashboard'])->name('dashboard');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'redirectToDashboard'])->name('home.redirect');

    // Legacy routes - redirect ke admin atau user berdasarkan role
    Route::get('/kategori', [App\Http\Controllers\HomeController::class, 'redirectKategori'])->name('daftarKategori');
    Route::get('/buku', [App\Http\Controllers\HomeController::class, 'redirectBuku'])->name('daftarBuku');
});