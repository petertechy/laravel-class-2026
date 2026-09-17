<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AuthenticateUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', [UserController::class, 'index']);

Route::get('/home', [UserController::class, 'home']);

Route::get('/register-user', [UserController::class, 'registerPage']);

Route::post('/register', [UserController::class, 'register']); 

Route::get('/login', [UserController::class, 'loginPage'])->name('login');

Route::post('/login', [UserController::class, 'login']);

Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard')->middleware(AuthenticateUser::class);

Route::post('logout', [UserController::class, 'logout']);

Route::get('/product', [ProductController::class, 'index'])->name('product');

Route::post('/create', [ProductController::class, 'create']);

Route::delete('/users/{user}', [UserController::class, 'destroy'])->middleware(AuthenticateUser::class);

Route::get('/users/{user}/edit', [UserController::class, 'edit'])->middleware(AuthenticateUser::class);

Route::put('/users/{user}', [UserController::class, 'update'])->middleware(AuthenticateUser::class);