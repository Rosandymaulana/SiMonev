<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuperAdmin\DataAdmin;
use App\Http\Controllers\SuperAdmin\DataPenyusul;
use App\Http\Controllers\SuperAdmin\DashboardSuperAdmin;
use App\Http\Controllers\Admin\UsulanController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Penyusul\DashboardPenyusul;
use App\Http\Controllers\Penyusul\UsulanPenyusul;
use App\Http\Controllers\Penyusul\StatusUsulanController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
| composer require maatwebsite/excel --with-all-dependencies
*/


//Middleware sementara masih belum
// Route::prefix('admin')->middleware('auth')->group(function () {
//     // Routes for admin dashboard
//     Route::get('/', 'AdminController@index');
//     Route::get('/users', 'AdminController@users');
//     Route::get('/settings', 'AdminController@settings');
// });

Route::get('/register', function () {
    return view('Auth.register');
});

Route::get('/', function () {
    return ('Halaman HOME PAGE');
});

// Route::get('/loginPage', [AuthController::class, 'loginPage'])->name('loginPage');
// Route::post('/login', [AuthController::class, 'login'])->name('login');
// ->middleware(['auth', 'verified', 'role:1']) // Super Admin
// ->middleware(['auth', 'verified', 'role:2']) // Admin
// ->middleware(['auth', 'verified', 'role:3']) // Penyusul


// SUPER ADMIN
Route::prefix('super-admin')->group(function () {
    // [Dashboard] Menampilkan Informasi Untuk SuperAdmin Seputar Hak Akses data Admin dan Penyusul
    Route::get('/', [DashboardSuperAdmin::class, 'index']);
    // [Data Admin] Menampilkan Tabel Admin dan Berhak untuk proses CRUD pada data Admin
    Route::resource('/admin', DataAdmin::class);
    // [Data Admin] Menampilkan Tabel Penyusul dan Berhak untuk proses CRUD pada data Penyusul
    Route::resource('/penyusul', DataPenyusul::class);
});

// ADMIN
Route::prefix('admin')->group(function () {
    // [Dashboard] Menampilkan Informasi Untuk Admin
    Route::get('/', [DashboardController::class, 'index']);
    // [Tabel Data Usulan] Menampilkan Seluruh Tabel Usulan
    Route::get('/tabel-usulan', [UsulanController::class, 'index']);
    Route::get('/tabel-usulan/{id}', [UsulanController::class, 'show']);

    Route::get('/exportusulan', [UsulanController::class, 'usulanexport']);
    Route::post('/importusulan', [UsulanController::class, 'usulanimport']);
});

// PENYUSUL
Route::prefix('penyusul')->middleware(['auth', 'verified', 'role:3'])->group(function () {
    // [Dashboard] Menampilkan Informasi Untuk Penyusul
    Route::post('/', [DashboardPenyusul::class, 'index']);
    Route::get('/', [DashboardPenyusul::class, 'index']);

    Route::resource('/tabel-usulan', UsulanPenyusul::class);
    // Route::get('/tabel-usulan', [UsulanPenyusul::class, 'index']);
    Route::get('/status-usulan', [StatusUsulanController::class, 'index']);

    // Route khusus untuk fitur "laporkan data"
    Route::get('tabel-usulan/{id}/laporkan-data', [UsulanPenyusul::class, 'laporkanData'])->name('usulan.laporkan-data');
    Route::post('tabel-usulan/{id}/laporkan-data', [UsulanPenyusul::class, 'simpanLaporan'])->name('usulan.laporkan-data');

    // Route untuk menampilkan halaman edit
    // Route::get('/tabel-usulan/{id}/edit', [UsulanPenyusul::class, 'edit']);

    // Route untuk memproses perubahan data dari halaman edit
    // Route::post('/tabel-usulan/{id}/update', [UsulanPenyusul::class, 'update']);
});

// Route::middleware(['approve'])->group(function () {
//     // Route pengeditan data
// });

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__ . '/auth.php';
