@extends('layouts.app')

@section('content')
<div class="space-y-6">

    <div class="bg-gradient-to-r from-sky-400 to-sky-600 rounded-2xl p-8 text-white shadow-lg flex flex-col md:flex-row items-center justify-between">
        <div class="space-y-2">
            <h1 class="text-3xl font-extrabold tracking-tight">Welcome back, Admin! 👋</h1>
            <p class="text-sky-100 text-sm md:text-base">Here is a quick overview of your Invora POS & Inventory System today.</p>
        </div>
        <div class="mt-4 md:mt-0">
            <a href="{{ route('products.create') ?? '#' }}" class="bg-white text-sky-700 hover:bg-sky-50 px-5 py-2.5 rounded-xl font-bold text-sm shadow-md transition duration-150 flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Add New Product
            </a>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

        <div class="bg-white p-6 rounded-2xl shadow-sm border border-sky-100 flex items-center justify-between hover:shadow-md transition">
            <div>
                <p class="text-xs font-bold text-slate-400 uppercase tracking-wider">Total Products</p>
                <h3 class="text-3xl font-black text-slate-800 mt-1">{{ $totalProducts ?? 0 }}</h3>
            </div>
            <div class="w-12 h-12 rounded-xl bg-sky-100 text-sky-600 flex items-center justify-center font-bold text-xl">
                📦
            </div>
        </div>

        <div class="bg-white p-6 rounded-2xl shadow-sm border border-sky-100 flex items-center justify-between hover:shadow-md transition">
            <div>
                <p class="text-xs font-bold text-slate-400 uppercase tracking-wider">Total Customers</p>
                <h3 class="text-3xl font-black text-slate-800 mt-1">{{ $totalCustomers ?? 0 }}</h3>
            </div>
            <div class="w-12 h-12 rounded-xl bg-sky-100 text-sky-600 flex items-center justify-center font-bold text-xl">
                👥
            </div>
        </div>

        <div class="bg-white p-6 rounded-2xl shadow-sm border border-sky-100 flex items-center justify-between hover:shadow-md transition">
            <div>
                <p class="text-xs font-bold text-slate-400 uppercase tracking-wider">System Status</p>
                <div class="flex items-center gap-2 mt-2">
                    <span class="w-3 h-3 rounded-full bg-emerald-500 animate-pulse"></span>
                    <span class="text-sm font-bold text-emerald-600">Active & Running</span>
                </div>
            </div>
            <div class="w-12 h-12 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center font-bold text-xl">
                🛡️
            </div>
        </div>

    </div>

    <div class="bg-white rounded-2xl p-6 shadow-sm border border-sky-100">
        <h3 class="text-lg font-bold text-slate-800 mb-2">System Overview</h3>
        <p class="text-slate-600 text-sm leading-relaxed">
            Welcome to the Invora POS & Inventory control center. Use the sidebar navigation on the left to manage your product catalog, view inventory counts, add system users, manage customer accounts, and process future customer transactions securely.
        </p>
    </div>

</div>
@endsection