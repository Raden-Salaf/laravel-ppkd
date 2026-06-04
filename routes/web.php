<?php

use App\Http\Controllers\LatihanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// Cara memanggil controller dengan menggunakan route yang simple
// Route::get('latihan', [LatihanController::class, 'index']);

// Cara memanggil controller dengan menggunakan route yang lebih kompleks
// kalo pake ini, tidak perlu import controller di atas, karena sudah menggunakan namespace lengkap
Route::get('latihan', [App\Http\Controllers\LatihanController::class, 'index']);
Route::get('tambah', [LatihanController::class, 'tambah'])->name('tambah'); // -> ini tambahan untuk yang menggunakan url Route
Route::get('kurang', [App\Http\Controllers\LatihanController::class, 'kurang'])->name('kurang');
Route::get('kali', [App\Http\Controllers\LatihanController::class, 'kali'])->name('kali');
Route::get('bagi', [App\Http\Controllers\LatihanController::class, 'bagi'])->name('bagi');


Route::post('action-tambah', [App\Http\Controllers\LatihanController::class, 'actionTambah'])->name('action-tambah');
Route::post('action-kurang', [App\Http\Controllers\LatihanController::class, 'actionKurang'])->name('action-kurang');
Route::post('action-kali', [App\Http\Controllers\LatihanController::class, 'actionKali'])->name('action-kali');
Route::post('action-bagi', [App\Http\Controllers\LatihanController::class, 'actionBagi'])->name('action-bagi');

// Profiles
Route::get('profile', [ProfileController::class, 'index'])
    ->name('profile')
    ->middleware(['auth', \App\Http\Middleware\PreventBackHistory::class]);

// Login page
Route::get('login', [LoginController::class, 'index'])->name('login');


// route untuk action login -> dimana ini insert data login sesuai dengan akun yang sudah dibuat di database
Route::post('action-login', [LoginController::class, 'actionLogin'])->name('action-login');
// route untuk action logout -> dimana ini akan menghapus session login dan mengembalikan ke halaman login
Route::post('action-logout', [LoginController::class, 'actionLogout'])->name('action-logout');


Route::get('dashboard', function () {
    return view('dashboard.index');
})->middleware(['auth', \App\Http\Middleware\PreventBackHistory::class]); // ini untuk membatasi akses ke halaman dashboard hanya untuk yang sudah login saja, karena sudah menggunakan middleware auth, maka jika belum login akan otomatis diarahkan ke halaman login
