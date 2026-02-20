<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\AdminController::class, 'index'])->middleware('auth')->name('home');

Route::get('admin', [App\Http\Controllers\AdminController::class, 'index'])->middleware('auth')->name('admin.index');

// Ajustes
Route::get('admin/ajustes', [App\Http\Controllers\AjusteController::class, 'index'])->middleware('auth')->name('admin.ajustes.index');
Route::post('admin/ajustes/create', [App\Http\Controllers\AjusteController::class, 'store'])->middleware('auth')->name('admin.ajustes.store');

// Roles
Route::get('admin/roles', [App\Http\Controllers\RoleController::class, 'index'])->middleware('auth')->name('admin.roles.index');
Route::get('admin/roles/create', [App\Http\Controllers\RoleController::class, 'create'])->middleware('auth')->name('admin.roles.create');
Route::post('admin/roles/create', [App\Http\Controllers\RoleController::class, 'store'])->middleware('auth')->name('admin.roles.store');
Route::get('admin/roles/{id}', [App\Http\Controllers\RoleController::class, 'show'])->middleware('auth')->name('admin.roles.show');
Route::get('admin/roles/{id}/edit', [App\Http\Controllers\RoleController::class, 'edit'])->middleware('auth')->name('admin.roles.edit');
Route::put('admin/roles/{id}', [App\Http\Controllers\RoleController::class, 'update'])->middleware('auth')->name('admin.roles.update');
Route::delete('admin/roles/{id}/', [App\Http\Controllers\RoleController::class, 'destroy'])->middleware('auth')->name('admin.roles.destroy');

// Usuarios
Route::get('admin/usuarios', [App\Http\Controllers\UsuarioController::class, 'index'])->middleware('auth')->name('admin.usuarios.index');
Route::get('admin/usuarios/create', [App\Http\Controllers\UsuarioController::class, 'create'])->middleware('auth')->name('admin.usuarios.create');
Route::post('admin/usuarios/create', [App\Http\Controllers\UsuarioController::class, 'store'])->middleware('auth')->name('admin.usuarios.store');
Route::get('admin/usuarios/{id}', [App\Http\Controllers\UsuarioController::class, 'show'])->middleware('auth')->name('admin.usuarios.show');
Route::get('admin/usuarios/{id}/edit', [App\Http\Controllers\UsuarioController::class, 'edit'])->middleware('auth')->name('admin.usuarios.edit');
Route::put('admin/usuarios/{id}', [App\Http\Controllers\UsuarioController::class, 'update'])->middleware('auth')->name('admin.usuarios.update');
Route::delete('admin/usuarios/{id}', [App\Http\Controllers\UsuarioController::class, 'destroy'])->middleware('auth')->name('admin.usuarios.destroy');
Route::post('admin/usuarios/{id}/restaurar', [App\Http\Controllers\UsuarioController::class, 'restore'])->middleware('auth')->name('admin.usuarios.restore');

// Categoria
Route::get('admin/categorias', [App\Http\Controllers\CategoriaController::class, 'index'])->middleware('auth')->name('admin.categorias.index');
Route::get('admin/categorias/create', [App\Http\Controllers\CategoriaController::class, 'create'])->middleware('auth')->name('admin.categorias.create');
Route::post('admin/categorias/create', [App\Http\Controllers\CategoriaController::class, 'store'])->middleware('auth')->name('admin.categorias.store');
Route::get('admin/categorias/{id}', [App\Http\Controllers\CategoriaController::class, 'show'])->middleware('auth')->name('admin.categorias.show');
Route::get('admin/categorias/{id}/edit', [App\Http\Controllers\CategoriaController::class, 'edit'])->middleware('auth')->name('admin.categorias.edit');
Route::put('admin/categorias/{id}', [App\Http\Controllers\CategoriaController::class, 'update'])->middleware('auth')->name('admin.categorias.update');
Route::delete('admin/categorias/{id}', [App\Http\Controllers\CategoriaController::class, 'destroy'])->middleware('auth')->name('admin.categorias.destroy');

// Productos
Route::get('admin/productos', [App\Http\Controllers\ProductoController::class, 'index'])->middleware('auth')->name('admin.productos.index');
Route::get('admin/productos/create', [App\Http\Controllers\ProductoController::class, 'create'])->middleware('auth')->name('admin.productos.create');
Route::post('admin/productos/create', [App\Http\Controllers\ProductoController::class, 'store'])->middleware('auth')->name('admin.productos.store');
Route::get('admin/productos/{id}', [App\Http\Controllers\ProductoController::class, 'show'])->middleware('auth')->name('admin.productos.show');
Route::get('admin/productos/{id}/edit', [App\Http\Controllers\ProductoController::class, 'edit'])->middleware('auth')->name('admin.productos.edit');
Route::put('admin/productos/{id}', [App\Http\Controllers\ProductoController::class, 'update'])->middleware('auth')->name('admin.productos.update');
Route::delete('admin/productos/{id}', [App\Http\Controllers\ProductoController::class, 'destroy'])->middleware('auth')->name('admin.productos.destroy');
Route::get('admin/productos/{id}/imagenes', [App\Http\Controllers\ProductoController::class, 'imagenes'])->middleware('auth')->name('admin.productos.imagenes');
Route::post('admin/productos/{id}/upload_imagen', [App\Http\Controllers\ProductoController::class, 'upload_imagen'])->middleware('auth')->name('admin.productos.upload_imagen');
Route::delete('admin/productos/{id}/eliminar_imagen/{imagen_id}', [App\Http\Controllers\ProductoController::class, 'eliminar_imagen'])->middleware('auth')->name('admin.productos.eliminar_imagen');

// Para la webs
Route::get('/', [App\Http\Controllers\WebController::class, 'index'])->name('web.index');
Route::get('/producto/{id}', [App\Http\Controllers\ProductoController::class, 'detalle_producto'])->name('web.detalle_producto');
