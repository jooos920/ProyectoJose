<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoriasProductosController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\ServiciosController;
use App\Http\Controllers\SucursalesController;
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

    // Productos Categorías
    Route::get('/categorias', [CategoriasProductosController::class, 'index'])->name('categorias.index');
    Route::get('/crear_categoria', [CategoriasProductosController::class, 'create'])->name('categorias.create');
    Route::post('/crear_categoria', [CategoriasProductosController::class, 'store'])->name('categorias.store');
    Route::get('/editar_categoria/{categoria}', [CategoriasProductosController::class, 'edit'])->name('categorias.edit');
    Route::post('/editar_categoria/{categoria}', [CategoriasProductosController::class, 'update'])->name('categorias.update');
    Route::get('/eliminar_categoria/{id}', [CategoriasProductosController::class, 'destroy'])->name('categorias.destroy');

    // Rutas Sucursales
    Route::get('/sucursales', [SucursalesController::class, 'index'])->name('sucursales.index');
    Route::get('/crear_sucursal', [SucursalesController::class, 'create'])->name('sucursales.create');
    Route::post('/crear_sucursal', [SucursalesController::class, 'store'])->name('sucursales.store');
    Route::get('/ver_sucursal/{sucursal}', [SucursalesController::class, 'show'])->name('sucursales.show');
    Route::get('/editar_sucursal/{sucursal}', [SucursalesController::class, 'edit'])->name('sucursales.edit');
    Route::post('/editar_sucursal/{sucursal}', [SucursalesController::class, 'update'])->name('sucursales.update');
    Route::get('/eliminar_sucursal/{id}', [SucursalesController::class, 'destroy'])->name('sucursales.destroy');

    // Rutas Servicios
Route::get('/servicios', [ServiciosController::class, 'index'])->name('servicios.index');
Route::get('/crear_servicio', [ServiciosController::class, 'create'])->name('servicios.create');
Route::post('/crear_servicio', [ServiciosController::class, 'store'])->name('servicios.store');
Route::get('/ver_servicio/{servicio}', [ServiciosController::class, 'show'])->name('servicios.show');
Route::get('/editar_servicio/{servicio}', [ServiciosController::class, 'edit'])->name('servicios.edit');
Route::post('/editar_servicio/{servicio}', [ServiciosController::class, 'update'])->name('servicios.update');
Route::get('/eliminar_servicio/{id}', [ServiciosController::class, 'destroy'])->name('servicios.destroy');

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
