<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('admin', [App\Http\Controllers\AdminController::class, 'index'])->middleware('auth')->name('admin.index');

//Ajustes
Route::get('admin/ajustes', [App\Http\Controllers\AjusteController::class, 'index'])->middleware('auth')->name('admin.ajustes.index');
