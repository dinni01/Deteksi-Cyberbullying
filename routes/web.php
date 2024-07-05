<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KlasifikasiController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DatasetController;
use App\Http\Controllers\ModelController;
use App\Http\Controllers\RiwayatDeteksiController;

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

Route::get('/home', function () {
    return view('landing_page');
})->name('landing_page');

// Admin Routes
Route::resource('admin/users', AdminController::class)->except(['show']); // Kecuali show jika tidak digunakan

Route::get('admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('admin/login', [AdminController::class, 'loginSubmit'])->name('admin.login.submit');

Route::middleware(['auth.admin', 'preventBackHistory', 'session.timeout'])->group(function () {
    Route::get('admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('admin/users', [AdminController::class, 'index'])->name('admin.index');
    Route::get('admin/users/create', [AdminController::class, 'create'])->name('admin.create');
    Route::post('admin/users', [AdminController::class, 'store'])->name('admin.store');
    Route::get('admin/users/{id}/edit', [AdminController::class, 'edit'])->name('admin.edit');
    Route::put('admin/users/{id}', [AdminController::class, 'update'])->name('admin.update');
    Route::delete('admin/users/{id}', [AdminController::class, 'destroy'])->name('admin.destroy');

    Route::post('admin/logout', [AdminController::class, 'logout'])->name('admin.logout');
});

// Other Routes


Route::get('admin/riwayatdeteksi', [RiwayatDeteksiController::class, 'index'])->name('riwayatdeteksi.index');
Route::delete('admin/riwayatdeteksi/{id}', [RiwayatDeteksiController::class, 'destroy'])->name('riwayatdeteksi.destroy');



Route::get('/klasifikasi', [KlasifikasiController::class, 'index'])->name('klasifikasi.index');
Route::post('/klasifikasi', [KlasifikasiController::class, 'process'])->name('klasifikasi.process');
Route::get('/train', [KlasifikasiController::class, 'trainAndSaveModel'])->name('train');
