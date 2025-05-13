<?php

use App\Http\Controllers\OtpController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware('guest')->group(function () {
    Route::get('login', [OtpController::class, 'showLoginForm'])->name('login');
    Route::post('otp/send', [OtpController::class, 'sendOtp'])->middleware('throttle:5,1')->name('otp.send');
    Route::get('otp/verify', [OtpController::class, 'showOtpForm'])->name('otp.verify');
    Route::post('otp/verify', [OtpController::class, 'verifyOtp'])->name('otp.verify');
    Route::post('otp/resend', [OtpController::class, 'resendOtp'])->middleware('throttle:5,1')->name('otp.resend');
});

require __DIR__.'/auth.php';