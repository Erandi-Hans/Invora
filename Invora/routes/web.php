<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CustomerController;

// Login Routes 
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);

// Authenticated Routes Group
Route::middleware(['auth'])->group(function () {

    // Dashboard Route
    Route::get('/dashboard', function () {
        return view('dashboard');
    });

    // Product Resource Routes (Includes Index, Create, Store, Show, Edit, Update, Destroy)
    Route::resource('products', ProductController::class);

    // Users Management Routes (Admin only)
    Route::resource('users', UserController::class);

    // Customer Management Routes
    Route::resource('customers', CustomerController::class);
});

// Welcome / Root Route
Route::get('/', function () {
    return view('welcome');
});
