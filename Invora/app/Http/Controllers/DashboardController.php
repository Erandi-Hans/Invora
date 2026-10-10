<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Customer;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProducts = Product::count();
        $totalCustomers = Customer::count();
        $totalUsers = User::count();

        return view('dashboard', compact('totalProducts', 'totalCustomers',  'totalUsers'));
    }
}
