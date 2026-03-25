<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
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

    // Step 1: Request OTP
    Route::get('/forgot-password', [AuthController::class, 'showForgotPasswordForm'])->name('password.request');
    Route::post('/forgot-password', [AuthController::class, 'sendResetOtp'])->name('password.email');

    // Step 2: Verify OTP
    Route::get('/reset-password/verify', [AuthController::class, 'showVerifyResetOtpForm'])->name('password.verify.form');
    Route::post('/reset-password/verify', [AuthController::class, 'verifyResetOtp'])->name('password.verify.submit');
    Route::post('/reset-password/resend', [AuthController::class, 'resendResetOtp'])->name('password.resend');

    // Step 3: New Password
    Route::get('/reset-password/new', [AuthController::class, 'showNewPasswordForm'])->name('password.reset.form');
    Route::post('/reset-password/new', [AuthController::class, 'updatePassword'])->name('password.update.submit');
});

Route::middleware('auth')->group(function () {
    Route::get('/settings', [UserProfileController::class, 'edit'])->name('settings');
    Route::post('/settings/profile', [UserProfileController::class, 'update'])->name('settings.update');
    Route::post('/settings/password', [UserProfileController::class, 'updatePassword'])->name('settings.password');

    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::post('/profile/next', [ProfileController::class, 'nextStep'])->name('profile.next');
    Route::post('/profile/back', [ProfileController::class, 'backStep'])->name('profile.back');

    // Admin Panel Routes (Restricted)
    Route::middleware('admin')->group(function () {
        Route::redirect('/admin', '/admin-control-panel');
        Route::prefix('admin-control-panel')->group(function () {
            Route::get('/', [AdminController::class, 'dashboard'])->name('admin.dashboard');
            Route::get('/members', [AdminController::class, 'members'])->name('admin.members');
            Route::get('/applications', [AdminController::class, 'applications'])->name('admin.applications');
            Route::get('/admins', [AdminController::class, 'admins'])->name('admin.admins');
        });
    });
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/logout', [AuthController::class, 'logout']);

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/privacy-policy', function () {
    return view('privacy-policy');
})->name('privacy-policy');

Route::get('/terms-and-conditions', function () {
    return view('terms-and-conditions');
})->name('terms-conditions');

Route::get('/frequently-asked-questions', function () {
    return view('faq');
})->name('faq');



