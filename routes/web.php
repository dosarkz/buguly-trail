<?php

use App\Http\Controllers\RegistrationController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('main');
});
// Registration routes
    Route::get('/register',                        [RegistrationController::class, 'create'])->name('register');
    Route::post('/register',                       [RegistrationController::class, 'store'])->name('register.store');
    Route::get('/register/payment/{order}',         [RegistrationController::class, 'payment'])->name('register.payment');
    Route::post('/register/payment/{order}/pay',    [RegistrationController::class, 'pay'])->name('register.pay');
    Route::get('/register/success/{order}',         [RegistrationController::class, 'success'])->name('register.success');
