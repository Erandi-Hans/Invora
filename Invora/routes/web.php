<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;

// Login Routes 
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);

// The dashboard visible after logging into the system (currently in a standard view)
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    });
});



Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    });

    // Product Resource Routes
    Route::resource('products', ProductController::class);
});



// Users Management Routes (Admin only)
Route::resource('users', UserController::class)->middleware('auth');



Route::get('/', function () {
    return view('welcome');
});
