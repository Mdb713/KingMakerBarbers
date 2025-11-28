<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\ProductoController;

Route::get('/', function () {
    return view('welcome'); // o tu vista principal
})->name('home');

Route::get('/login', [AuthenticatedSessionController::class, 'create'])
    ->name('login');

// Enviar formulario de login
Route::post('/login', [AuthenticatedSessionController::class, 'store'])
    ->name('login.post');

// Cerrar sesión
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->name('logout');

// Mostrar formulario de registro
Route::get('/register', [RegisteredUserController::class, 'showRegistrationForm'])
    ->name('register');

// Enviar formulario de registro
Route::post('/register', [RegisteredUserController::class, 'register'])
    ->name('register.post');
    
Route::get('/perfil', [PerfilController::class, 'index'])->name('perfil')->middleware('auth');

Route::get('/productos', [ProductoController::class, 'mostrarProductos'])->name('productos');
Route::post('/carrito/agregar', [CarritoController::class, 'agregar'])->name('carrito.agregar');
Route::get('/carrito', [CarritoController::class, 'ver'])->name('carrito.ver');
Route::post('/carrito/eliminar', [CarritoController::class, 'eliminar'])->name('carrito.eliminar');
Route::post('/carrito/pagar', [CarritoController::class, 'pagar'])->name('carrito.pagar')->middleware('auth');
Route::post('/carrito/vaciar', [CarritoController::class, 'vaciar'])->name('carrito.vaciar')->middleware('auth');
