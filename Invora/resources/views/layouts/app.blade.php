<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invora - POS & Inventory System</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-slate-50 font-sans antialiased text-slate-800">
    <!-- Main Application Wrapper -->
    <div class="flex h-screen overflow-hidden">

        <!-- Sidebar Section with Sky Blue Theme (Fixed Width on Left) -->
        <aside class="w-64 bg-sky-100 text-slate-100 flex flex-col shadow-xl z-30">

            <!-- Brand Header with Drop Animation -->
            <div class="h-16 flex items-center justify-center px-6 bg-sky-300 border-b border-sky-500/30 overflow-hidden">
                <span class="text-xl font-extrabold tracking-wider text-black flex items-center gap-2 animate-container">
                    <!-- Animated SVG Icon -->
                    <svg class="w-6 h-6 text-black animate-drop-item" style="--i: 0;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                    </svg>

                    <!-- Animated Letters of 'Invora POS' with individual delays -->
                    <span class="inline-flex">
                        <span class="animate-drop-item" style="--i: 1;">I</span>
                        <span class="animate-drop-item" style="--i: 2;">n</span>
                        <span class="animate-drop-item" style="--i: 3;">v</span>
                        <span class="animate-drop-item" style="--i: 4;">o</span>
                        <span class="animate-drop-item" style="--i: 5;">r</span>
                        <span class="animate-drop-item" style="--i: 6;">a</span>
                        <span class="animate-drop-item px-1" style="--i: 7;">&nbsp;</span>
                        <span class="animate-drop-item" style="--i: 8;">P</span>
                        <span class="animate-drop-item" style="--i: 9;">O</span>
                        <span class="animate-drop-item" style="--i: 10;">S</span>
                    </span>
                </span>
            </div>

            <!-- Custom CSS for Drop and Loop Animation -->
            <style>
                @keyframes dropLoop {

                    0%,
                    60%,
                    100% {
                        opacity: 0;
                        transform: translateY(-20px);
                    }

                    10%,
                    40% {
                        opacity: 1;
                        transform: translateY(0);
                    }
                }

                .animate-drop-item {
                    display: inline-block;
                    opacity: 0;
                    animation: dropLoop 6s infinite;
                    animation-delay: calc(var(--i) * 0.15s);
                }
            </style>

            <!-- Navigation Menu with Main and Sub-menu style layout -->
            <nav class="flex-1 px-4 py-6 space-y-1.5 overflow-y-auto">

                <!-- Dashboard Link -->
                <a href="/dashboard" class="flex items-center gap-3 px-4 py-3 rounded-xl transition duration-150 font-medium text-sm hover:bg-sky-200 hover:text-black {{ request()->is('dashboard') ? 'bg-sky-300 text-black shadow-sm' : 'text-black' }}">
                    <svg class="w-5 h-5 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                    </svg>
                    Dashboard
                </a>

                <!-- Products / Inventory Link -->
                <a href="{{ route('products.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl transition duration-150 font-medium text-sm hover:bg-sky-200 hover:text-black {{ request()->routeIs('products.*') ? 'bg-sky-300 text-black shadow-sm' : 'text-black' }}">
                    <svg class="w-5 h-5 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                    </svg>
                    Inventory Management
                </a>

                <!-- Users Management Link -->
                <a href="{{ route('users.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl transition duration-150 font-medium text-sm hover:bg-sky-200 hover:text-black {{ request()->routeIs('users.*') ? 'bg-sky-300 text-black shadow-sm' : 'text-black' }}">
                    <svg class="w-5 h-5 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                    Users Management
                </a>

                <!-- Customers Link -->
                <a href="{{ route('customers.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl transition duration-150 font-medium text-sm hover:bg-sky-200 hover:text-black {{ request()->routeIs('customers.*') ? 'bg-sky-300 text-black shadow-sm' : 'text-black' }}">
                    <svg class="w-5 h-5 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    Customers
                </a>


                <!-- Invoices Link -->
                <a href="{{ route('invoices.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl transition duration-150 font-medium text-sm hover:bg-sky-200 hover:text-black {{ request()->routeIs('invoices.*') ? 'bg-sky-300 text-black shadow-sm' : 'text-black' }}">
                    <svg class="w-5 h-5 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                    </svg>
                    Invoices
                </a>


            </nav>

            <!-- Logout Section at Bottom -->
            <div class="p-4 bg-sky-300 border-t border-sky-500/30">
                <form action="/logout" method="POST">
                    @csrf
                    <button type="submit" class="w-full flex items-center justify-center gap-2 bg-red-700 hover:bg-red-800 text-white py-2.5 px-4 rounded-xl text-sm font-semibold transition duration-150 shadow-sm">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                        Logout
                    </button>
                </form>
            </div>
        </aside>

        <!-- Right Main Container -->
        <div class="flex-1 flex flex-col h-screen overflow-hidden bg-slate-50 relative">

            <!-- Sticky Full-Width Header Section (Top) -->
            <header class="bg-sky-50 shadow-sm h-16 flex items-center justify-between px-8 border-b border-sky-200 sticky top-0 z-20 w-full flex-shrink-0">
                <h2 class="text-lg font-bold text-slate-800 tracking-tight">
                    @if(request()->is('dashboard'))
                    Dashboard
                    @elseif(request()->routeIs('products.*'))
                    Inventory Management
                    @elseif(request()->routeIs('users.*'))
                    Users Management
                    @elseif(request()->routeIs('customers.*'))
                    Customers
                    @elseif(request()->routeIs('invoices.*'))
                    Invoices
                    @else
                    Admin Panel
                    @endif
                </h2>

                <div class="flex items-center gap-3">
                    <span class="text-sm font-semibold text-sky-900 bg-sky-200/60 px-3.5 py-1.5 rounded-full border border-sky-300">Welcome, Admin</span>
                </div>
            </header>

            <!-- Scrollable Content Area (Added pb-16 so content won't hide behind the fixed footer) -->
            <div class="flex-1 overflow-y-auto pb-16">
                <!-- Main Page Content -->
                <main class="p-8">
                    @yield('content')
                </main>
            </div>

            <!-- Fixed Footer at the very bottom of the screen, never moves down with data -->
            <footer class="bg-white border-t border-slate-200 py-3 px-8 text-center text-xs text-slate-500 absolute bottom-0 left-0 right-0 z-20">
                &copy; 2026 Invora POS & Inventory System. All rights reserved.
            </footer>
        </div>

    </div>
</body>

</html>