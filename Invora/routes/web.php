<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CustomerController;
use App\Models\Product;
use App\Models\Customer;
use App\Http\Controllers\InvoiceController;

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

Route::get('/dashboard', function () {
    $totalProducts = Product::count();
    $totalCustomers = Customer::count();
    return view('dashboard', compact('totalProducts', 'totalCustomers'));
})->middleware(['auth']);



Route::resource('users', UserController::class)->middleware(['auth']);
Route::resource('customers', CustomerController::class)->middleware(['auth']);
Route::resource('invoices', InvoiceController::class)->middleware(['auth']);
Route::get('/invoices/{id}/download', [InvoiceController::class, 'downloadPdf'])->name('invoices.download');
Route::get('/invoices/{id}/download', [InvoiceController::class, 'downloadPdf'])->name('invoices.download');
Route::get('/invoices/{id}/download', [InvoiceController::class, 'downloadPdf'])->name('invoices.download');
// Welcome / Root Route
Route::get('/', function () {
    return view('welcome');
});
