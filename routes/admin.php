<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\HomeController;
use Illuminate\Support\Facades\Route;

//Adding prefix in RouteServiceProvider to 'admin'
Route::get('', [HomeController::class, 'index'])->name('admin.home');

Route::resource('categories', CategoryController::class)->names('admin.categories');