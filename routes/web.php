<?php

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
    return view('pages.Admin.dashboard');
});

Route::get('/tabel_usulan', function () {
    return view('pages.Admin.tabelUsulan');
});

Route::get('/peta_usulan', function () {
    return view('pages.Admin.petaUsulan');
});
