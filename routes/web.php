<?php

use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\BankCenterCreditController;
use App\Http\Controllers\RegistrationController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('main');
})->name('main');

// Auth Routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);

    Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

    Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('/reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');

    Route::any('/bcc/postpay', [BankCenterCreditController::class, 'postpay'])->name('postpay');
    Route::any('/bcc/callback', [BankCenterCreditController::class, 'callback'])->name('callback');
});

Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

// Registration routes
Route::get('/register', [RegistrationController::class, 'create'])->name('register');
Route::post('/register', [RegistrationController::class, 'store'])->name('register.store');

Route::group(['where' => ['order' => '[a-f0-9\-]{36}']], function () {
    Route::get('/register/payment/{order}', [RegistrationController::class, 'payment'])->name('register.payment');
    Route::post('/register/payment/{order}/pay', [RegistrationController::class, 'pay'])->name('register.pay');
    Route::get('/register/success/{order}', [RegistrationController::class, 'success'])->name('register.success');
});
