@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto space-y-6">

    <!-- Welcome Hero Banner -->
    <div class="bg-gradient-to-r from-sky-500 to-sky-700 rounded-2xl p-8 text-white shadow-md flex flex-col md:flex-row items-center justify-between">
        <div class="space-y-2">
            <h1 class="text-3xl font-black tracking-tight">Welcome back, Admin! 👋</h1>
            <p class="text-sky-100 text-sm md:text-base font-medium">Here is a quick overview of your Invora POS & Inventory System today.</p>
        </div>
        <div class="mt-4 md:mt-0">
            <a href="{{ route('products.create') }}" class="bg-white text-sky-700 hover:bg-sky-50 px-5 py-2.5 rounded-xl font-bold text-sm shadow-sm transition duration-150 flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Add New Product
            </a>
        </div>
    </div>

    <!-- Analytics & Status Grid (Fixed 3-Column Layout) -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

        <!-- Total Products Metric Card -->
        <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-200 flex items-center justify-between hover:shadow-md transition">
            <div class="space-y-1">
                <p class="text-xs font-bold text-slate-400 uppercase tracking-wider">Total Products</p>
                <h3 class="text-3xl font-extrabold text-slate-900">{{ $totalProducts ?? 0 }}</h3>
            </div>
            <div class="w-14 h-14 rounded-xl bg-sky-50 text-sky-600 flex items-center justify-center text-2xl shadow-inner">
                📦
            </div>
        </div>

        <!-- Total Customers Metric Card -->
        <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-200 flex items-center justify-between hover:shadow-md transition">
            <div class="space-y-1">
                <p class="text-xs font-bold text-slate-400 uppercase tracking-wider">Total Customers</p>
                <h3 class="text-3xl font-extrabold text-slate-900">{{ $totalCustomers ?? 0 }}</h3>
            </div>
            <div class="w-14 h-14 rounded-xl bg-sky-50 text-sky-600 flex items-center justify-center text-2xl shadow-inner">
                👥
            </div>
        </div>

        <!-- System Status Card -->
        <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-200 flex items-center justify-between hover:shadow-md transition sm:col-span-2 lg:col-span-1">
            <div class="space-y-1">
                <p class="text-xs font-bold text-slate-400 uppercase tracking-wider">System Status</p>
                <div class="flex items-center gap-2 pt-1">
                    <span class="w-3 h-3 rounded-full bg-emerald-500 animate-pulse"></span>
                    <span class="text-sm font-bold text-emerald-600">Active & Running</span>
                </div>
            </div>
            <div class="w-14 h-14 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center text-2xl shadow-inner">
                🛡️
            </div>
        </div>

    </div>

    <!-- System Overview Section -->
    <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-200 space-y-3">
        <h3 class="text-base font-bold text-slate-900">System Overview</h3>
        <p class="text-slate-600 text-sm leading-relaxed">
            Welcome to the Invora POS & Inventory control center. Use the sidebar navigation on the left to manage your product catalog, view inventory counts, add system users, manage customer accounts, and process future customer transactions securely.
        </p>
    </div>

</div>
@endsection