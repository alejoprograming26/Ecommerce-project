<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\AdminController::class, 'index'])->middleware('auth')->name('home') ;

Route::get('admin', [App\Http\Controllers\AdminController::class, 'index'])->middleware('auth')->name('admin.index');

//Ajustes
Route::get('admin/ajustes', [App\Http\Controllers\AjusteController::class, 'index'])->middleware('auth')->name('admin.ajustes.index');
Route::post('admin/ajustes/create', [App\Http\Controllers\AjusteController::class, 'store'])->middleware('auth')->name('admin.ajustes.store');

//Roles
Route::get('admin/roles', [App\Http\Controllers\RoleController::class, 'index'])->middleware('auth')->name('admin.roles.index');
Route::get('admin/roles/create', [App\Http\Controllers\RoleController::class, 'create'])->middleware('auth')->name('admin.roles.create');
Route::post('admin/roles/create', [App\Http\Controllers\RoleController::class, 'store'])->middleware('auth')->name('admin.roles.store');
Route::get('admin/roles/{id}', [App\Http\Controllers\RoleController::class, 'show'])->middleware('auth')->name('admin.roles.show');
Route::get('admin/roles/{id}/edit', [App\Http\Controllers\RoleController::class, 'edit'])->middleware('auth')->name('admin.roles.edit');
Route::put('admin/roles/{id}', [App\Http\Controllers\RoleController::class, 'update'])->middleware('auth')->name('admin.roles.update');
Route::delete('admin/roles/{id}/', [App\Http\Controllers\RoleController::class, 'destroy'])->middleware('auth')->name('admin.roles.destroy');
