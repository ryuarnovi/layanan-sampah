<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LayananSampahController;

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

// Route untuk beranda menggunakan HomeController

// Route untuk beranda
Route::get('/', [HomeController::class, 'index'])->name('home');

// Resource route untuk Layanan Sampah
Route::resource('layanan-sampah', LayananSampahController::class);