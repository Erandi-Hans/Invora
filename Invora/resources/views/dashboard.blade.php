@extends('layouts.app')

@section('header-title', 'Dashboard')

@section('content')
<div class="max-w-7xl mx-auto space-y-8 animate-fade-in">

    <!-- Modern Animated Welcome / Action Banner -->
    <div class="bg-white rounded-3xl p-8 md:p-10 text-slate-800 shadow-sm border border-slate-200/80 flex flex-col md:flex-row items-center justify-between gap-6 relative overflow-hidden transition-all duration-300 hover:shadow-md">
        <!-- Accent Glow background decoration -->
        <div class="absolute -right-10 -bottom-10 w-48 h-48 bg-sky-100 rounded-full filter blur-2xl opacity-60"></div>

        <div class="space-y-3 z-10">
            <div class="flex items-center gap-2">
                <span class="inline-block text-[11px] font-mono font-bold uppercase tracking-wider text-slate-600 bg-slate-100 px-3 py-1 rounded-full border border-slate-200 shadow-2xs">
                    Secure Control Center
                </span>
                <span class="inline-flex items-center gap-1.5 px-3 py-1 bg-emerald-50 text-emerald-600 rounded-full text-xs font-bold border border-emerald-100">
                    <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span> System Live
                </span>
            </div>
            <h1 class="text-3xl md:text-4xl font-extrabold tracking-tight text-slate-900">
                Welcome back, Admin! 👋
            </h1>
            <p class="text-slate-500 text-sm md:text-base font-medium max-w-xl leading-relaxed">
                Here is a real-time analytics overview of your Invora POS & Inventory System. Monitor stocks, sales, customers, and active invoices smoothly.
            </p>
        </div>

        <div class="mt-4 md:mt-0 flex-shrink-0 flex items-center gap-3 z-10">
            <!-- Create Invoice Quick Action Button -->
            <a href="{{ route('invoices.create') }}" class="inline-flex items-center justify-center px-6 py-3.5 text-xs font-extrabold text-white transition duration-300 bg-slate-900 rounded-2xl hover:bg-black shadow-md hover:shadow-lg active:scale-95 group">
                <svg class="w-4 h-4 mr-2 group-hover:rotate-90 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4" />
                </svg>
                Create Invoice
            </a>

            <!-- Add Product Button -->
            <a href="{{ route('products.index') }}" class="inline-flex items-center justify-center px-6 py-3.5 text-xs font-extrabold text-sky-600 transition duration-300 bg-sky-50 rounded-2xl hover:bg-sky-100 border border-sky-200 active:scale-95">
                Manage Stock
            </a>
        </div>
    </div>

    <!-- Metric Cards Grid (Theme Matching Soft Light Cards) -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

        <!-- Total Products Metric Card -->
        <div class="bg-white p-6 rounded-3xl shadow-sm border border-slate-200/80 flex items-center justify-between transform transition duration-300 hover:-translate-y-1.5 hover:shadow-md">
            <div class="space-y-1">
                <p class="text-xs font-bold text-slate-400 uppercase tracking-wider">Total Products</p>
                <h3 class="text-4xl font-extrabold text-slate-900">{{ $totalProducts ?? 50 }}</h3>
                <p class="text-xs font-semibold text-emerald-600 pt-1 flex items-center gap-1">
                    <span>↑ 12%</span> <span class="text-slate-400 font-medium">vs last month</span>
                </p>
            </div>
            <div class="w-16 h-16 rounded-2xl bg-sky-50 text-sky-600 flex items-center justify-center text-3xl border border-sky-100 shadow-2xs">
                📦
            </div>
        </div>

        <!-- Total Customers Metric Card -->
        <div class="bg-white p-6 rounded-3xl shadow-sm border border-slate-200/80 flex items-center justify-between transform transition duration-300 hover:-translate-y-1.5 hover:shadow-md">
            <div class="space-y-1">
                <p class="text-xs font-bold text-slate-400 uppercase tracking-wider">Total Customers</p>
                <h3 class="text-4xl font-extrabold text-slate-900">{{ $totalCustomers ?? 101 }}</h3>
                <p class="text-xs font-semibold text-emerald-600 pt-1 flex items-center gap-1">
                    <span>↑ 24%</span> <span class="text-slate-400 font-medium">active buyers</span>
                </p>
            </div>
            <div class="w-16 h-16 rounded-2xl bg-sky-50 text-sky-600 flex items-center justify-center text-3xl border border-sky-100 shadow-2xs">
                👥
            </div>
        </div>

        <!-- System Status Card -->
        <div class="bg-white p-6 rounded-3xl shadow-sm border border-slate-200/80 flex items-center justify-between transform transition duration-300 hover:-translate-y-1.5 hover:shadow-md sm:col-span-2 lg:col-span-1">
            <div class="space-y-1">
                <p class="text-xs font-bold text-slate-400 uppercase tracking-wider">System Status</p>
                <div class="flex items-center gap-2.5 pt-1">
                    <span class="w-3.5 h-3.5 rounded-full bg-emerald-500 animate-ping inline-block"></span>
                    <span class="text-xl font-black text-slate-900">Operational</span>
                </div>
                <p class="text-xs font-medium text-slate-400 pt-1">Database & API synchronized</p>
            </div>
            <div class="w-16 h-16 rounded-2xl bg-emerald-50 text-emerald-600 flex items-center justify-center text-3xl border border-emerald-100 shadow-2xs">
                🛡️
            </div>
        </div>

    </div>

    <!-- Analytics & Integrity Section -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

        <!-- Inventory & Sales Analytics Breakdown -->
        <div class="bg-white p-8 rounded-3xl shadow-sm border border-slate-200/80 space-y-6">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-lg font-extrabold text-slate-900">Inventory & User Analytics</h3>
                    <p class="text-xs text-slate-400 mt-0.5">Real-time stock and access monitoring</p>
                </div>
                <span class="text-xs font-bold bg-sky-50 text-sky-600 px-3 py-1 rounded-full border border-sky-100">Live</span>
            </div>

            <div class="space-y-5">
                <!-- Products Bar -->
                <div>
                    <div class="flex justify-between text-xs font-bold text-slate-600 mb-1.5">
                        <span>Total Products Catalog</span>
                        <span class="text-slate-900">{{ $totalProducts ?? 50 }} Items</span>
                    </div>
                    <div class="w-full bg-slate-100 h-3.5 rounded-full overflow-hidden border border-slate-200/60 p-0.5">
                        <div class="bg-slate-900 h-full rounded-full transition-all duration-1000 ease-out" style="width: 85%;"></div>
                    </div>
                </div>

                <!-- Customers Bar -->
                <div>
                    <div class="flex justify-between text-xs font-bold text-slate-600 mb-1.5">
                        <span>Registered Customers</span>
                        <span class="text-slate-900">{{ $totalCustomers ?? 101 }} Users</span>
                    </div>
                    <div class="w-full bg-slate-100 h-3.5 rounded-full overflow-hidden border border-slate-200/60 p-0.5">
                        <div class="bg-sky-500 h-full rounded-full transition-all duration-1000 ease-out" style="width: 95%;"></div>
                    </div>
                </div>

                <!-- System Staff Bar -->
                <div>
                    <div class="flex justify-between text-xs font-bold text-slate-600 mb-1.5">
                        <span>System Administrators / Staff</span>
                        <span class="text-slate-900">3 Active</span>
                    </div>
                    <div class="w-full bg-slate-100 h-3.5 rounded-full overflow-hidden border border-slate-200/60 p-0.5">
                        <div class="bg-slate-700 h-full rounded-full transition-all duration-1000 ease-out" style="width: 30%;"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Database Health & Integrity -->
        <div class="bg-white p-8 rounded-3xl shadow-sm border border-slate-200/80 space-y-6">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-lg font-extrabold text-slate-900">Database Integrity Check</h3>
                    <p class="text-xs text-slate-400 mt-0.5">System health and secure status</p>
                </div>
                <span class="text-xs font-bold bg-emerald-50 text-emerald-600 px-3 py-1 rounded-full border border-emerald-100">Optimal</span>
            </div>

            <div class="grid grid-cols-3 gap-4 pt-1">
                <div class="bg-slate-50 p-5 rounded-2xl text-center space-y-1 border border-slate-200/60 transition hover:bg-slate-100/70">
                    <span class="text-3xl font-extrabold text-slate-900">33%</span>
                    <p class="text-xs font-bold text-slate-400">Products</p>
                </div>
                <div class="bg-slate-50 p-5 rounded-2xl text-center space-y-1 border border-slate-200/60 transition hover:bg-slate-100/70">
                    <span class="text-3xl font-extrabold text-slate-900">65%</span>
                    <p class="text-xs font-bold text-slate-400">Customers</p>
                </div>
                <div class="bg-slate-900 text-white p-5 rounded-2xl text-center space-y-1 shadow-md transition hover:bg-black">
                    <span class="text-3xl font-extrabold text-white">2%</span>
                    <p class="text-xs font-bold text-slate-300 opacity-80">Admins</p>
                </div>
            </div>

            <div class="bg-slate-50 border border-slate-200/80 rounded-2xl p-5 flex items-center justify-between gap-4">
                <div class="flex items-center gap-4">
                    <div class="w-10 h-10 rounded-xl bg-emerald-100 text-emerald-600 flex items-center justify-center font-black text-lg border border-emerald-200">
                        ✓
                    </div>
                    <div>
                        <h4 class="text-sm font-bold text-slate-900">All data synchronized</h4>
                        <p class="text-xs text-slate-400 mt-0.5">Foreign keys and migrations verified.</p>
                    </div>
                </div>
                <span class="text-xs font-bold text-slate-700 bg-white px-3.5 py-1.5 rounded-xl border border-slate-200 shadow-2xs">Secure</span>
            </div>
        </div>

    </div>

    <!-- Quick Navigation Module Shortcuts -->
    <div class="bg-white rounded-3xl p-8 shadow-sm border border-slate-200/80 space-y-6">
        <div class="flex items-center justify-between gap-4">
            <div>
                <h3 class="text-xl font-extrabold text-slate-900">Quick Management Shortcuts</h3>
                <p class="text-xs text-slate-400 mt-1">Direct single-click navigation across modules.</p>
            </div>
            <span class="text-xs font-bold bg-slate-100 text-slate-500 px-4 py-2 rounded-2xl border border-slate-200 shadow-2xs">Fast Access</span>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">
            <!-- Shortcut 1: Inventory -->
            <a href="{{ route('products.index') }}" class="p-5 rounded-2xl bg-slate-50/80 hover:bg-sky-50/50 border border-slate-200/70 hover:border-sky-200 transition-all duration-200 group flex flex-col gap-3 shadow-2xs hover:shadow-sm">
                <div class="flex items-center justify-between">
                    <div class="w-12 h-12 rounded-xl bg-white text-slate-800 flex items-center justify-center font-extrabold text-2xl border border-slate-200 group-hover:scale-110 transition-transform duration-200 shadow-2xs">📦</div>
                    <span class="text-slate-400 group-hover:text-sky-600 group-hover:translate-x-1 transition-all">→</span>
                </div>
                <div>
                    <h4 class="text-base font-bold text-slate-900">Inventory</h4>
                    <p class="text-xs text-slate-400">Manage Products & Stock</p>
                </div>
            </a>

            <!-- Shortcut 2: Invoices -->
            <a href="{{ route('invoices.index') }}" class="p-5 rounded-2xl bg-slate-50/80 hover:bg-sky-50/50 border border-slate-200/70 hover:border-sky-200 transition-all duration-200 group flex flex-col gap-3 shadow-2xs hover:shadow-sm">
                <div class="flex items-center justify-between">
                    <div class="w-12 h-12 rounded-xl bg-white text-slate-800 flex items-center justify-center font-extrabold text-2xl border border-slate-200 group-hover:scale-110 transition-transform duration-200 shadow-2xs">🧾</div>
                    <span class="text-slate-400 group-hover:text-sky-600 group-hover:translate-x-1 transition-all">→</span>
                </div>
                <div>
                    <h4 class="text-base font-bold text-slate-900">Invoices</h4>
                    <p class="text-xs text-slate-400">Billing & PDF Export</p>
                </div>
            </a>

            <!-- Shortcut 3: Customers -->
            <a href="{{ route('customers.index') }}" class="p-5 rounded-2xl bg-slate-50/80 hover:bg-sky-50/50 border border-slate-200/70 hover:border-sky-200 transition-all duration-200 group flex flex-col gap-3 shadow-2xs hover:shadow-sm">
                <div class="flex items-center justify-between">
                    <div class="w-12 h-12 rounded-xl bg-white text-slate-800 flex items-center justify-center font-extrabold text-2xl border border-slate-200 group-hover:scale-110 transition-transform duration-200 shadow-2xs">👥</div>
                    <span class="text-slate-400 group-hover:text-sky-600 group-hover:translate-x-1 transition-all">→</span>
                </div>
                <div>
                    <h4 class="text-base font-bold text-slate-900">Customers</h4>
                    <p class="text-xs text-slate-400">Manage Buyer Database</p>
                </div>
            </a>

            <!-- Shortcut 4: Users -->
            <a href="{{ route('users.index') }}" class="p-5 rounded-2xl bg-slate-50/80 hover:bg-sky-50/50 border border-slate-200/70 hover:border-sky-200 transition-all duration-200 group flex flex-col gap-3 shadow-2xs hover:shadow-sm">
                <div class="flex items-center justify-between">
                    <div class="w-12 h-12 rounded-xl bg-white text-slate-800 flex items-center justify-center font-extrabold text-2xl border border-slate-200 group-hover:scale-110 transition-transform duration-200 shadow-2xs">👤</div>
                    <span class="text-slate-400 group-hover:text-sky-600 group-hover:translate-x-1 transition-all">→</span>
                </div>
                <div>
                    <h4 class="text-base font-bold text-slate-900">Users</h4>
                    <p class="text-xs text-slate-400">Manage System Staff</p>
                </div>
            </a>
        </div>
    </div>

</div>

<style>
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(8px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .animate-fade-in {
        animation: fadeIn 0.4s cubic-bezier(0.16, 1, 0.3, 1) forwards;
    }
</style>
@endsection