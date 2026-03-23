<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/verify-email', [AuthController::class, 'showVerificationNotice'])->name('verification.notice');
Route::post('/send-verification-otp', [AuthController::class, 'sendOtp'])->name('otp.send');

Route::get('/verify-otp', [AuthController::class, 'showVerifyForm'])->name('otp.verify');
Route::post('/verify-otp', [AuthController::class, 'verifyOtp'])->name('otp.verify.submit');

Route::middleware('guest')->group(function () {
    Route::get('/register', function () {
        return view('register');
    })->name('register');

    Route::post('/register', [AuthController::class, 'register'])->name('register.submit');

    Route::get('/login', function () {
        return view('login');
    })->name('login');

    Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
});

Route::middleware('auth')->group(function () {
    Route::get('/settings', [UserProfileController::class, 'edit'])->name('settings');
    Route::post('/settings/profile', [UserProfileController::class, 'update'])->name('settings.update');
    Route::post('/settings/password', [UserProfileController::class, 'updatePassword'])->name('settings.password');

    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::post('/profile/next', [ProfileController::class, 'nextStep'])->name('profile.next');
    Route::post('/profile/back', [ProfileController::class, 'backStep'])->name('profile.back');
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/logout', [AuthController::class, 'logout']);

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');
