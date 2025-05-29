<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return inertia('App/Authentication/Login');
})->name('app.login');
Route::get('/register', function () {
    return inertia('App/Authentication/Register');
})->name('app.register');
Route::get('/forgot-password', function () {
    return inertia('App/Authentication/ForgotPassword');
})->name('app.forgot_password');
