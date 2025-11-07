<?php

use Illuminate\Support\Facades\Route;

// página principal
Route::get('/', function () {
    return view('welcome');
});

// mostrar vista de login
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

// mostrar vista de registro
Route::get('/register', function () {
    return view('auth.register');
})->name('register');
