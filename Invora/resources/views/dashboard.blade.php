@extends('layouts.app')

@section('content')
<div class="space-y-6">
    
    <!-- Welcome Banner -->
    <div class="bg-gradient-to-r from-indigo-600 to-purple-600 text-white p-6 rounded-xl shadow-lg flex flex-col md:flex-row justify-between items-center gap-4">
        <div>
            <h1 class="text-2xl font-bold">Welcome back, Admin! 👋</h1>
            <p class="text-indigo-100 mt-1">Here is a quick overview of your Invora POS & Inventory System today.</p>
        </div>
        <div>
            <a href="{{ route('products.create') }}" class="bg-white text-indigo-600 px-4 py-2 rounded-lg font-semibold shadow hover:bg-indigo-50 transition duration-150 inline-block">+ Add New Product</a>
        </div>
    </div>

    <!-- Quick Stats Grid -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        
        <!-- Total Products Card -->
        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-500 uppercase tracking-wider">Total Products</p>
                <h3 class="text-3xl font-extrabold text-gray-900 mt-1">{{\App\Models\Product::count()}}</h3>
            </div>
            <div class="p-3 bg-indigo-50 text-indigo-600 rounded-xl">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                </svg>
            </div>
        </div>

        <!-- Total Customers Card -->
        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-500 uppercase tracking-wider">Total Customers</p>
                <h3 class="text-3xl font-extrabold text-gray-900 mt-1">0</h3>
            </div>
            <div class="p-3 bg-green-50 text-green-600 rounded-xl">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                </svg>
            </div>
        </div>

        <!-- System Status Card -->
        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-500 uppercase tracking-wider">System Status</p>
                <h3 class="text-base font-bold text-green-600 mt-2 flex items-center gap-2">
                    <span class="w-2.5 h-2.5 rounded-full bg-green-500 animate-pulse"></span> Active & Running
                </h3>
            </div>
            <div class="p-3 bg-blue-50 text-blue-600 rounded-xl">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                </svg>
            </div>
        </div>

    </div>

    <!-- System Overview Section -->
    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
        <h3 class="text-lg font-bold text-gray-800 mb-2">System Overview</h3>
        <p class="text-gray-600 text-sm leading-relaxed">
            Welcome to the Invora POS & Inventory control center. Use the sidebar navigation on the left to manage your product catalog, view inventory counts, and process future customer transactions securely.
        </p>
    </div>

</div>
@endsection