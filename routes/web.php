<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\ValoracionesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index'); // o tu vista principal
})->name('home');

Route::get('/login', [AuthenticatedSessionController::class, 'create'])
    ->name('login');
Route::post('/test-csrf', function () {
    return 'ok';
});
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

Route::middleware(['auth'])->group(function () {
    // Página de reservas
    Route::get('/reserva', [ReservaController::class, 'create'])->name('reservas');
    Route::post('/reserva', [ReservaController::class, 'store'])->name('reservas.store');
    Route::delete('/reserva/{cita}', [ReservaController::class, 'destroy'])->name('reservas.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/perfil', [PerfilController::class, 'index'])->name('perfil.index');
    Route::put('/perfil', [PerfilController::class, 'update'])->name('perfil.update');
});
// Página de los productos y el carrito
Route::get('/productos', [ProductoController::class, 'mostrarProductos'])->name('productos');
Route::post('/carrito/agregar', [CarritoController::class, 'agregar'])->name('carrito.agregar');
Route::get('/carrito', [CarritoController::class, 'ver'])->name('carrito.ver');
Route::post('/carrito/eliminar', [CarritoController::class, 'eliminar'])->name('carrito.eliminar');
Route::post('/carrito/pagar', [CarritoController::class, 'pagar'])->name('carrito.pagar')->middleware('auth');
Route::post('/carrito/vaciar', [CarritoController::class, 'vaciar'])->name('carrito.vaciar')->middleware('auth');

// Pagina de Contacto
Route::get('/contacto', function () {
    return view('contacto');
})->name('contacto');

// Panel de Administración
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/panel', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.panel');
    Route::get('/usuarios/create', [AdminController::class, 'createUser'])->name('usuarios.create');
    Route::post('/usuarios', [AdminController::class, 'storeUser'])->name('usuarios.store');
    Route::get('/usuarios/{user}/edit', [AdminController::class, 'editUser'])->name('usuarios.edit');
    Route::put('/usuarios/{user}', [AdminController::class, 'updateUser'])->name('usuarios.update');
    Route::delete('/usuarios/{user}', [AdminController::class, 'deleteUser'])->name('usuarios.delete');
});

// Valoraciones de los usuarios
Route::get('/valoraciones', [ValoracionesController::class, 'index'])->name('valoraciones');
Route::post('/valoraciones', [ValoracionesController::class, 'store'])->middleware('auth')->name('valoraciones.store');
