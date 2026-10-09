@extends('layouts.app')

@section('header-title', 'Dashboard')

@section('content')
<div class="max-w-7xl mx-auto space-y-8">

    <!-- Modern Welcome / Action Banner -->
    <div class="bg-active rounded-3xl p-10 text-canvas shadow-2xl flex flex-col md:flex-row items-center justify-between gap-6 border border-border/10">
        <div class="space-y-2.5">
            <span class="inline-block text-xs font-mono font-bold uppercase tracking-wider text-slate-500 bg-slate-800 px-2.5 py-1 rounded-full border border-slate-700">Secure Control Center</span>
            <h1 class="text-3xl md:text-4xl font-black tracking-tight text-canvas">Welcome back, Admin! 👋</h1>
            <p class="text-slate-400 text-sm md:text-base font-medium max-w-xl leading-relaxed">
                Here is a real-time analytics overview of your Invora POS & Inventory System. Monitor stocks, users, and customer database smoothly.
            </p>
        </div>
        <div class="mt-6 md:mt-0 flex-shrink-0">
            <button class="inline-flex items-center justify-center px-8 py-3.5 text-base font-bold text-active transition duration-300 bg-canvas rounded-2xl hover:bg-slate-300 shadow-xl active:scale-95 group">
                <svg class="w-6 h-6 mr-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4" />
                </svg>
                Add New Product
            </button>
        </div>
    </div>

    <!-- Metric Cards Grid (Monochrome) -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

        <!-- Total Products Metric Card -->
        <div class="bg-subtle p-6 rounded-3xl shadow-inner border border-border/80 flex items-center justify-between transform transition duration-200 hover:-translate-y-1 hover:shadow-xl">
            <div class="space-y-1">
                <p class="text-sm font-bold text-muted uppercase tracking-wider">Total Products</p>
                <h3 class="text-4xl font-black text-active">{{ $totalProducts ?? 50 }}</h3>
                <p class="text-sm font-semibold text-slate-600 pt-1">+ 12% <span class="text-slate-400 font-medium">vs last month</span></p>
            </div>
            <div class="w-16 h-16 rounded-2xl bg-canvas text-active flex items-center justify-center text-3xl shadow border border-border">
                📦
            </div>
        </div>

        <!-- Total Customers Metric Card -->
        <div class="bg-subtle p-6 rounded-3xl shadow-inner border border-border/80 flex items-center justify-between transform transition duration-200 hover:-translate-y-1 hover:shadow-xl">
            <div class="space-y-1">
                <p class="text-sm font-bold text-muted uppercase tracking-wider">Total Customers</p>
                <h3 class="text-4xl font-black text-active">{{ $totalCustomers ?? 100 }}</h3>
                <p class="text-sm font-semibold text-slate-600 pt-1">+ 24% <span class="text-slate-400 font-medium">active buyers</span></p>
            </div>
            <div class="w-16 h-16 rounded-2xl bg-canvas text-active flex items-center justify-center text-3xl shadow border border-border">
                👥
            </div>
        </div>

        <!-- System Status Card -->
        <div class="bg-subtle p-6 rounded-3xl shadow-inner border border-border/80 flex items-center justify-between transform transition duration-200 hover:-translate-y-1 hover:shadow-xl sm:col-span-2 lg:col-span-1">
            <div class="space-y-1">
                <p class="text-sm font-bold text-muted uppercase tracking-wider">System Status</p>
                <div class="flex items-center gap-3 pt-1.5">
                    <span class="w-4 h-4 rounded-full bg-slate-900 animate-pulse inline-block shadow-sm"></span>
                    <span class="text-lg font-black text-slate-950">Operational</span>
                </div>
                <p class="text-sm font-medium text-muted pt-1">Database & API synchronized</p>
            </div>
            <div class="w-16 h-16 rounded-2xl bg-canvas text-active flex items-center justify-center text-3xl shadow border border-border">
                🛡️
            </div>
        </div>

    </div>

    <!-- Analytics & Integrity Section -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

        <!-- Inventory & User Analytics Bar Breakdown -->
        <div class="bg-subtle p-8 rounded-3xl shadow-inner border border-border/80 space-y-6">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-lg font-black text-active">Inventory & User Analytics</h3>
                    <p class="text-xs text-muted mt-0.5">Real-time stock and access monitoring</p>
                </div>
                <span class="text-xs font-bold bg-canvas text-muted px-3 py-1 rounded-full border border-border">Live</span>
            </div>

            <div class="space-y-5">
                <!-- Products Bar (Replaced primary color with slate-950) -->
                <div>
                    <div class="flex justify-between text-xs font-bold text-slate-700 mb-1.5">
                        <span>Total Products Catalog</span>
                        <span class="text-active">{{ $totalProducts ?? 50 }} Items</span>
                    </div>
                    <div class="w-full bg-canvas h-4 rounded-full overflow-hidden border border-border">
                        <div class="bg-slate-950 h-full rounded-full transition-all duration-500" style="width: 85%;"></div>
                    </div>
                </div>

                <!-- Customers Bar (Replaced primary color with slate-900) -->
                <div>
                    <div class="flex justify-between text-xs font-bold text-slate-700 mb-1.5">
                        <span>Registered Customers</span>
                        <span class="text-active">{{ $totalCustomers ?? 100 }} Users</span>
                    </div>
                    <div class="w-full bg-canvas h-4 rounded-full overflow-hidden border border-border">
                        <div class="bg-slate-900 h-full rounded-full transition-all duration-500" style="width: 100%;"></div>
                    </div>
                </div>

                <!-- System Staff Bar (Replaced accent color with slate-700) -->
                <div>
                    <div class="flex justify-between text-xs font-bold text-slate-700 mb-1.5">
                        <span>System Administrators / Staff</span>
                        <span class="text-active">3 Active</span>
                    </div>
                    <div class="w-full bg-canvas h-4 rounded-full overflow-hidden border border-border">
                        <div class="bg-slate-700 h-full rounded-full transition-all duration-500" style="width: 30%;"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Database Health & Integrity -->
        <div class="bg-subtle p-8 rounded-3xl shadow-inner border border-border/80 space-y-6">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-lg font-black text-active">Database Integrity Check</h3>
                    <p class="text-xs text-muted mt-0.5">System health and secure status</p>
                </div>
                <span class="text-xs font-bold bg-canvas text-muted px-3 py-1 rounded-full border border-border">Optimal</span>
            </div>

            <div class="grid grid-cols-3 gap-4 pt-1">
                <div class="bg-canvas p-5 rounded-2xl text-center space-y-1 border border-border">
                    <span class="text-3xl font-black text-active">33%</span>
                    <p class="text-xs font-bold text-muted">Products</p>
                </div>
                <div class="bg-canvas p-5 rounded-2xl text-center space-y-1 border border-border">
                    <span class="text-3xl font-black text-active">65%</span>
                    <p class="text-xs font-bold text-muted">Customers</p>
                </div>
                <div class="bg-active text-canvas p-5 rounded-2xl text-center space-y-1 shadow-xl">
                    <span class="text-3xl font-black text-canvas">2%</span>
                    <p class="text-xs font-bold text-canvas opacity-70">Admins</p>
                </div>
            </div>

            <div class="bg-canvas border border-border rounded-2xl p-5 flex items-center justify-between gap-4 shadow-inner">
                <div class="flex items-center gap-4">
                    <div class="w-11 h-11 rounded-xl bg-subtle text-slate-700 flex items-center justify-center font-black text-xl border border-border">✓</div>
                    <div>
                        <h4 class="text-sm font-black text-active">All data synchronized</h4>
                        <p class="text-xs text-muted mt-0.5">Foreign keys and migrations verified.</p>
                    </div>
                </div>
                <span class="text-xs font-bold text-slate-900 bg-border px-3.5 py-1.5 rounded-xl border border-border/70 shadow-inner">Secure</span>
            </div>
        </div>

    </div>

    <!-- Quick Navigation Card (Monochrome) -->
    <div class="bg-subtle rounded-3xl p-8 shadow-inner border border-border/80 space-y-6">
        <div class="flex items-center justify-between gap-4">
            <div>
                <h3 class="text-xl font-black text-active">Quick Navigation & Shortcuts</h3>
                <p class="text-sm text-muted mt-1">Jump directly to core management modules.</p>
            </div>
            <div class="flex-shrink-0">
                <span class="text-xs font-bold bg-canvas text-muted px-4 py-2 rounded-2xl border border-border shadow-inner">Fast Access</span>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">
            <!-- Shortcut 1 -->
            <a href="#" class="p-5 rounded-2xl bg-canvas hover:bg-subtle border border-border transition group flex flex-col gap-3 shadow-sm">
                <div class="flex items-center justify-between">
                    <div class="w-12 h-12 rounded-xl bg-subtle text-active flex items-center justify-center font-black text-2xl border border-border group-hover:scale-105 transition shadow-sm">📦</div>
                    <span class="text-muted group-hover:text-active group-hover:translate-x-1 transition-all">→</span>
                </div>
                <div>
                    <h4 class="text-base font-black text-active">Inventory</h4>
                    <p class="text-xs text-muted">Manage Products</p>
                </div>
            </a>
            <!-- Shortcut 2 -->
            <a href="#" class="p-5 rounded-2xl bg-canvas hover:bg-subtle border border-border transition group flex flex-col gap-3 shadow-sm">
                <div class="flex items-center justify-between">
                    <div class="w-12 h-12 rounded-xl bg-subtle text-active flex items-center justify-center font-black text-2xl border border-border group-hover:scale-105 transition shadow-sm">👤</div>
                    <span class="text-muted group-hover:text-active group-hover:translate-x-1 transition-all">→</span>
                </div>
                <div>
                    <h4 class="text-base font-black text-active">Users</h4>
                    <p class="text-xs text-muted">Manage Staff</p>
                </div>
            </a>
            <!-- Shortcut 3 -->
            <a href="#" class="p-5 rounded-2xl bg-canvas hover:bg-subtle border border-border transition group flex flex-col gap-3 shadow-sm">
                <div class="flex items-center justify-between">
                    <div class="w-12 h-12 rounded-xl bg-subtle text-active flex items-center justify-center font-black text-2xl border border-border group-hover:scale-105 transition shadow-sm">👥</div>
                    <span class="text-muted group-hover:text-active group-hover:translate-x-1 transition-all">→</span>
                </div>
                <div>
                    <h4 class="text-base font-black text-active">Customers</h4>
                    <p class="text-xs text-muted">Manage Buyers</p>
                </div>
            </a>
            <!-- Shortcut 4 -->
            <a href="#" class="p-5 rounded-2xl bg-canvas hover:bg-subtle border border-border transition group flex flex-col gap-3 shadow-sm">
                <div class="flex items-center justify-between">
                    <div class="w-12 h-12 rounded-xl bg-subtle text-active flex items-center justify-center font-black text-2xl border border-border group-hover:scale-105 transition shadow-sm">📊</div>
                    <span class="text-muted group-hover:text-active group-hover:translate-x-1 transition-all">→</span>
                </div>
                <div>
                    <h4 class="text-base font-black text-active">Metrics</h4>
                    <p class="text-xs text-muted">View Reports</p>
                </div>
            </a>
        </div>
    </div>

</div>
@endsection