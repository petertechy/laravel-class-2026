<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', [UserController::class, 'index']);

Route::get('/home', [UserController::class, 'home']);

Route::get('/register-user', [UserController::class, 'registerPage']);

Route::post('/register', [UserController::class, 'register']); 

Route::get('/login', [UserController::class, 'loginPage']);

Route::post('/login', [UserController::class, 'login']);