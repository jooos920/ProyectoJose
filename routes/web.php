<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\UsuariosController;
use App\Http\Middleware\AdminIsAuthenticated;
use App\Http\Middleware\UserIsAuthenticated;

Route::middleware(AdminIsAuthenticated::class)->group(function () {
    Route::get('/dashboard', [InicioController::class, 'dashboard'])->name('dashboard');
    // Rutas Productos
    Route::get('/productos', [ProductosController::class, 'index'])->name('productos.index');
    Route::get('/crear_producto', [ProductosController::class, 'create'])->name('productos.create');
    Route::post('/crear_producto', [ProductosController::class, 'store'])->name('productos.store');
    Route::get('/ver_producto/{producto}', [ProductosController::class, 'show'])->name('productos.show');
    Route::get('/editar_producto/{producto}', [ProductosController::class, 'edit'])->name('productos.edit');
    Route::post('/editar_producto/{producto}', [ProductosController::class, 'update'])->name('productos.update');
    Route::get('/eliminar_producto/{id}', [ProductosController::class, 'destroy'])->name('productos.destroy');

    // Rutas Usuarios
    Route::get('/usuarios', [UsuariosController::class, 'index'])->name('users.index');
    Route::get('/crear_usuario', [UsuariosController::class, 'create'])->name('users.create');
    Route::post('/crear_usuario', [UsuariosController::class, 'store'])->name('users.store');
    Route::get('/editarusuario/{user}', [UsuariosController::class, 'admin_edit'])->name('users.admin.edit');
Route::post('/editarusuario/{user}', [UsuariosController::class, 'admin_update'])->name('users.admin.update');

Route::get('/verinformacion/{user}', [UsuariosController::class, 'showAdmin'])->name('users.show');

});

Route::middleware(UserIsAuthenticated::class)->group(function () {
    Route::get('/', [InicioController::class, 'inicio'])->name('inicio');
});
Route::get('/login', [AuthController::class, 'showLogin'])->name('verLogin');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/registrar', [AuthController::class, 'create'])->name('signup');
Route::post('/registrar', [AuthController::class, 'store'])->name('signup.store');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/ver_informacion/{user}', [UsuariosController::class, 'show'])->name('users_show');
Route::get('/editar_usuario/{user}', [UsuariosController::class, 'edit'])->name('users.edit');
Route::post('/editar_usuario/{user}', [UsuariosController::class, 'update'])->name('users.update');
Route::get('/eliminar_usuario/{id}', [UsuariosController::class, 'destroy'])->name('users.destroy');
