<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Customer;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProducts = Product::count();
        $totalCustomers = Customer::count();

        return view('dashboard', compact('totalProducts', 'totalCustomers'));
    }
}
