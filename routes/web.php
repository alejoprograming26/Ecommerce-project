<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('admin', [App\Http\Controllers\AdminController::class, 'index'])->middleware('auth')->name('admin.index');

//Ajustes
Route::get('admin/ajustes', [App\Http\Controllers\AjusteController::class, 'index'])->middleware('auth')->name('admin.ajustes.index');
Route::post('admin/ajustes/create', [App\Http\Controllers\AjusteController::class, 'store'])->middleware('auth')->name('admin.ajustes.store');
