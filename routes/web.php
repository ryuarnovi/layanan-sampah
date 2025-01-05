<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LayananSampahController;

// Route untuk beranda
Route::get('/', function () {
    return view('home');
})->name('home');

// Resource route untuk Layanan Sampah
Route::resource('layanan-sampah', LayananSampahController::class);

// Route untuk halaman profil
Route::get('/profile', function() {
    return view('profile.profile'); // Use dot notation for subfolder
})->middleware('auth')->name('profile');

// Route untuk halaman edit profil
Route::get('/profile/edit', function () {
    return view('auth.edit-profile'); // Ensure this view exists
})->middleware('auth')->name('profile.edit');

// Route untuk memperbarui profil
Route::put('/profile', [AuthController::class, 'update'])->middleware('auth')->name('profile.update');

// Route untuk menampilkan halaman login
Route::get('/login', function () {
    return view('auth.login'); // Ensure this view exists
})->name('login.form');

// Route untuk menangani login
Route::post('/login', [AuthController::class, 'login'])->name('login');

// Route untuk menampilkan halaman pendaftaran
Route::get('/register', function () {
    return view('auth.register'); // Ensure this view exists
})->name('register.form');

// Route untuk menangani pendaftaran
Route::post('/register', [AuthController::class, 'register'])->name('register');

// Route untuk logging out
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Route untuk login dengan Google


Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('google.login');
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback'])->name('google.callback');
// Route untuk halaman create layanan sampah
Route::get('/layanan-sampah/create', function () {
    return view('layanan-sampah.create');
})->name('layanan-sampah.create');