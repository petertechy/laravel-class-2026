<?php

use App\Http\Controllers\Api\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AuthenticateUser;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/', [UserController::class, 'index']);

Route::get('/home', [UserController::class, 'home']);

Route::get('/register-user', [UserController::class, 'registerPage']);

Route::post('/register', [UserController::class, 'register']); 

Route::get('/login', [UserController::class, 'loginPage'])->name('login');

Route::post('/login', [UserController::class, 'login']);

Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard')->middleware(AuthenticateUser::class);

Route::post('logout', [UserController::class, 'logout']);

Route::get('/product', [ProductController::class, 'index'])->name('product');

Route::get('/products/{product}', [ProductController::class, 'show']);

Route::post('/create', [ProductController::class, 'create']);

Route::put('/products/{product}', [ProductController::class, 'update']);

Route::delete('/products/{product}', [ProductController::class, 'destroy']);

Route::delete('/users/{user}', [UserController::class, 'destroy'])->middleware(AuthenticateUser::class);

Route::get('/users/{user}/edit', [UserController::class, 'edit'])->middleware(AuthenticateUser::class);

Route::put('/users/{user}', [UserController::class, 'update'])->middleware(AuthenticateUser::class);