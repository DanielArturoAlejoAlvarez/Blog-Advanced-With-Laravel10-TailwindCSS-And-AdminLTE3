<?php

use App\Http\Controllers\Admin\HomeController;
use Illuminate\Support\Facades\Route;

//Adding prefix in RouteServiceProvider to 'admin'
Route::get('', [HomeController::class, 'index']);