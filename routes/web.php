<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LayananSampahController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\RelawanController;
use App\Http\Controllers\ContactController;



// Route untuk beranda
Route::get('/', function () {
    return view('home');
})->name('home');

// Resource route untuk Layanan Sampah
Route::resource('layanan-sampah', LayananSampahController::class);

// Profile routes - consolidated into one group
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/profile/settings', [ProfileController::class, 'settings'])->name('profile.setting');
    Route::post('/settings/update', [ProfileController::class, 'updateTheme'])->name('profile.updateTheme');    Route::post('/profile/notifications', [ProfileController::class, 'updateNotifications'])->name('profile.updateNotifications');
    Route::post('/profile/upload-avatar', [ProfileController::class, 'uploadAvatar'])->name('profile.uploadAvatar');
    // Language change route
    Route::get('/language/{lang}', [LanguageController::class, 'change'])->name('language.change');
});

// Authentication routes
Route::get('/login', function () {
    return view('auth.login');
})->name('login.form');

Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register.form');

Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Google authentication routes
Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('google.login');
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback'])->name('google.callback');

// Layanan Sampah routes
Route::get('/layanan-sampah/create', function () {
    return view('layanan-sampah.create');
})->name('layanan-sampah.create');

// Donation routes
Route::get('/donasi', [DonationController::class, 'show'])->name('donasi.donasi');
Route::post('/donasi/process', [DonationController::class, 'processDonation'])->name('donasi.process');
Route::get('/donasi/payment', [DonationController::class, 'showDonationForm'])->name('donasi.payment');

Route::middleware(['auth'])->group(function () {
    Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
    Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
    Route::post('/posts/{post}/like', [PostController::class, 'like'])->name('posts.like');});
    Route::get('/search', [PostController::class, 'search'])->name('posts.search');


// Rute untuk menyimpan komentar
Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');

// Relawan routes
Route::middleware(['auth'])->group(function () {
    Route::get('/relawan/register', [RelawanController::class, 'showRegistrationForm'])->name('relawan.form');
    Route::post('/relawan/register', [RelawanController::class, 'register'])->name('relawan.register');
});
// Other existing routes...

Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');