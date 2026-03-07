<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\AdminController::class, 'index'])->middleware('auth','can:Dashboard del Administrador')->name('home');

Route::get('admin', [App\Http\Controllers\AdminController::class, 'index'])->middleware('auth','can:Dashboard del Administrador')->name('admin.index');

// Ajustes
Route::get('admin/ajustes', [App\Http\Controllers\AjusteController::class, 'index'])->middleware('auth','can:Ajustes del Sistema')->name('admin.ajustes.index');
Route::post('admin/ajustes/create', [App\Http\Controllers\AjusteController::class, 'store'])->middleware('auth','can:Actualizar Ajustes')->name('admin.ajustes.store');

// Roles
Route::get('admin/roles', [App\Http\Controllers\RoleController::class, 'index'])->middleware('auth','can:Ver Listado de Roles')->name('admin.roles.index');
Route::get('admin/roles/create', [App\Http\Controllers\RoleController::class, 'create'])->middleware('auth','can:Crear Rol')->name('admin.roles.create');
Route::post('admin/roles/create', [App\Http\Controllers\RoleController::class, 'store'])->middleware('auth','can:Guardar Rol')->name('admin.roles.store');
Route::get('admin/roles/{id}', [App\Http\Controllers\RoleController::class, 'show'])->middleware('auth','can:Ver Detalle de Rol')->name('admin.roles.show');
Route::get('admin/roles/{id}/edit', [App\Http\Controllers\RoleController::class, 'edit'])->middleware('auth','can:Editar Rol')->name('admin.roles.edit');
Route::put('admin/roles/{id}', [App\Http\Controllers\RoleController::class, 'update'])->middleware('auth','can:Actualizar Rol')->name('admin.roles.update');
Route::delete('admin/roles/{id}/', [App\Http\Controllers\RoleController::class, 'destroy'])->middleware('auth','can:Eliminar Rol')->name('admin.roles.destroy');
Route::get('admin/roles/{id}/permisos', [App\Http\Controllers\RoleController::class, 'permisos'])->middleware('auth','can:Ver Permisos de Rol')->name('admin.roles.permisos');
Route::put('admin/roles/{id}/update_permisos', [App\Http\Controllers\RoleController::class, 'update_permisos'])->middleware('auth','can:Actualizar Permisos de Rol')->name('admin.roles.update_permisos');

// Usuarios
Route::get('admin/usuarios', [App\Http\Controllers\UsuarioController::class, 'index'])->middleware('auth','can:Ver Listado de Usuarios')->name('admin.usuarios.index');
Route::get('admin/usuarios/create', [App\Http\Controllers\UsuarioController::class, 'create'])->middleware('auth','can:Crear Usuario')->name('admin.usuarios.create');
Route::post('admin/usuarios/create', [App\Http\Controllers\UsuarioController::class, 'store'])->middleware('auth','can:Guardar Usuario')->name('admin.usuarios.store');
Route::get('admin/usuarios/{id}', [App\Http\Controllers\UsuarioController::class, 'show'])->middleware('auth','can:Ver Detalle de Usuario')->name('admin.usuarios.show');
Route::get('admin/usuarios/{id}/edit', [App\Http\Controllers\UsuarioController::class, 'edit'])->middleware('auth','can:Editar Usuario')->name('admin.usuarios.edit');
Route::put('admin/usuarios/{id}', [App\Http\Controllers\UsuarioController::class, 'update'])->middleware('auth','can:Actualizar Usuario')->name('admin.usuarios.update');
Route::delete('admin/usuarios/{id}', [App\Http\Controllers\UsuarioController::class, 'destroy'])->middleware('auth','can:Eliminar Usuario')->name('admin.usuarios.destroy');
Route::post('admin/usuarios/{id}/restaurar', [App\Http\Controllers\UsuarioController::class, 'restore'])->middleware('auth','can:Restaurar Usuario')->name('admin.usuarios.restore');

// Categoria
Route::get('admin/categorias', [App\Http\Controllers\CategoriaController::class, 'index'])->middleware('auth','can:Ver Listado de Categorias')->name('admin.categorias.index');
Route::get('admin/categorias/create', [App\Http\Controllers\CategoriaController::class, 'create'])->middleware('auth','can:Crear Categoria')->name('admin.categorias.create');
Route::post('admin/categorias/create', [App\Http\Controllers\CategoriaController::class, 'store'])->middleware('auth','can:Guardar Categoria')->name('admin.categorias.store');
Route::get('admin/categorias/{id}', [App\Http\Controllers\CategoriaController::class, 'show'])->middleware('auth','can:Ver Detalle de Categoria')->name('admin.categorias.show');
Route::get('admin/categorias/{id}/edit', [App\Http\Controllers\CategoriaController::class, 'edit'])->middleware('auth','can:Editar Categoria')->name('admin.categorias.edit');
Route::put('admin/categorias/{id}', [App\Http\Controllers\CategoriaController::class, 'update'])->middleware('auth','can:Actualizar Categoria')->name('admin.categorias.update');
Route::delete('admin/categorias/{id}', [App\Http\Controllers\CategoriaController::class, 'destroy'])->middleware('auth','can:Eliminar Categoria')->name('admin.categorias.destroy');

// Productos
Route::get('admin/productos', [App\Http\Controllers\ProductoController::class, 'index'])->middleware('auth','can:Ver Listado de Productos')->name('admin.productos.index');
Route::get('admin/productos/create', [App\Http\Controllers\ProductoController::class, 'create'])->middleware('auth','can:Crear Producto')->name('admin.productos.create');
Route::post('admin/productos/create', [App\Http\Controllers\ProductoController::class, 'store'])->middleware('auth','can:Guardar Producto')->name('admin.productos.store');
Route::get('admin/productos/{id}', [App\Http\Controllers\ProductoController::class, 'show'])->middleware('auth','can:Ver Detalle de Producto')->name('admin.productos.show');
Route::get('admin/productos/{id}/edit', [App\Http\Controllers\ProductoController::class, 'edit'])->middleware('auth','can:Editar Producto')->name('admin.productos.edit');
Route::put('admin/productos/{id}', [App\Http\Controllers\ProductoController::class, 'update'])->middleware('auth','can:Actualizar Producto')->name('admin.productos.update');
Route::delete('admin/productos/{id}', [App\Http\Controllers\ProductoController::class, 'destroy'])->middleware('auth','can:Eliminar Producto')->name('admin.productos.destroy');
Route::get('admin/productos/{id}/imagenes', [App\Http\Controllers\ProductoController::class, 'imagenes'])->middleware('auth','can:Ver Imagenes de Producto')->name('admin.productos.imagenes');
Route::post('admin/productos/{id}/upload_imagen', [App\Http\Controllers\ProductoController::class, 'upload_imagen'])->middleware('auth','can:Subir Imagen de Producto')->name('admin.productos.upload_imagen');
Route::delete('admin/productos/{id}/eliminar_imagen/{imagen_id}', [App\Http\Controllers\ProductoController::class, 'eliminar_imagen'])->middleware('auth','can:Eliminar Imagen de Producto')->name('admin.productos.eliminar_imagen');

Route::get('admin/pedidos', [App\Http\Controllers\OrdenController::class, 'index'])->middleware('auth','can:Ver Listado de Pedidos')->name('admin.pedidos.index');
Route::get('admin/pedidos/{id}', [App\Http\Controllers\OrdenController::class, 'create'])->middleware('auth','can:Crear Pedido')->name('admin.pedidos.create');
Route::post('admin/pedidos/{id}', [App\Http\Controllers\OrdenController::class, 'store'])->middleware('auth','can:Guardar Pedido')->name('admin.pedidos.store');


// Para la webs
Route::get('/', [App\Http\Controllers\WebController::class, 'index'])->name('web.index');
Route::get('/producto/{id}', [App\Http\Controllers\ProductoController::class, 'detalle_producto'])->name('web.detalle_producto');
Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('web.dashboard');
Route::get('/carrito', [App\Http\Controllers\DashboardController::class, 'carrito'])->name('web.carrito');
Route::get('/web/login', [App\Http\Controllers\DashboardController::class, 'login'])->name('web.login');
Route::post('/web/login', [App\Http\Controllers\DashboardController::class, 'autenticacion'])->name('web.autenticacion');
Route::get('/web/registro', [App\Http\Controllers\DashboardController::class, 'registro'])->name('web.registro');
Route::post('/web/registro', [App\Http\Controllers\DashboardController::class, 'crear_cuenta'])->name('web.crear_cuenta');
Route::get('/buscar', [App\Http\Controllers\WebController::class, 'buscar_producto'])->name('web.buscar_producto');

Route::get('/favoritos', [App\Http\Controllers\ProductoFavoritoController::class, 'index'])->name('web.favorito.index');
Route::post('/favoritos', [App\Http\Controllers\ProductoFavoritoController::class, 'store'])->name('web.favorito.store');
Route::delete('/favoritos/{id}', [App\Http\Controllers\ProductoFavoritoController::class, 'destroy'])->name('web.favorito.destroy');

Route::get('/carrito', [App\Http\Controllers\CarritoController::class, 'index'])->name('web.carrito.index');
Route::post('/carrito/agregar', [App\Http\Controllers\CarritoController::class, 'store'])->name('web.carrito.store');
Route::put('/carrito/actualizar', [App\Http\Controllers\CarritoController::class, 'update'])->name('web.carrito.update');
Route::delete('/carrito/{id}', [App\Http\Controllers\CarritoController::class, 'destroy'])->name('web.carrito.destroy');
Route::post('/carrito/limpiar', [App\Http\Controllers\CarritoController::class, 'limpiar'])->name('web.carrito.limpiar');

//Ajuste Clientes
Route::get('/ajustes', [App\Http\Controllers\DashboardController::class, 'ajustes'])->name('web.ajustes.index');
Route::put('/ajustes/informacion_personal', [App\Http\Controllers\DashboardController::class, 'informacion_personal'])->name('web.ajustes.informacion_personal');
Route::put('/ajustes/seguridad', [App\Http\Controllers\DashboardController::class, 'seguridad'])->name('web.ajustes.seguridad');

// Ruta Paypal
Route::post('/paypal/pago', [App\Http\Controllers\PaypalController::class, 'pago'])->name('web.paypal.pago');
Route::get('/paypal/gracias', [App\Http\Controllers\PaypalController::class, 'gracias'])->name('web.paypal.gracias');
Route::get('/paypal/orden_completado/{id}', [App\Http\Controllers\PaypalController::class, 'orden_completado'])->name('web.paypal.orden_completado');
Route::get('/paypal/cancelar', [App\Http\Controllers\PaypalController::class, 'cancelar'])->name('web.paypal.cancelar');

// Para error 404
Route::fallback(function () {
    if (request()->is('admin*')) {
        return response()->view('errors.404-admin', [], 404);
    }

    return response()->view('errors.404', [], 404);
});
