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
    <div class="flex h-screen overflow-hidden">

        <!-- Sidebar Section with Sky Blue Theme -->
        <aside class="w-64 bg-sky-100 text-slate-100 flex flex-col shadow-xl z-25">
            <!-- App Logo / Brand Header -->
            <div class="h-16 flex items-center justify-center px-6 bg-sky-700 border-b border-sky-500/30">
                <span class="text-xl font-extrabold tracking-wider text-black flex items-center gap-2">
                    <svg class="w-6 h-6 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                    </svg>
                    Invora POS
                </span>
            </div>

            <!-- Navigation Menu with Main and Sub-menu style layout -->
            <nav class="flex-1 px-4 py-6 space-y-1.5 overflow-y-auto">

                <!-- Dashboard Link -->
                <a href="/dashboard" class="flex items-center gap-3 px-4 py-3 rounded-xl transition duration-150 font-medium text-sm hover:bg-sky-500 hover:text-black {{ request()->is('dashboard') ? 'bg-sky-500 text-black shadow-sm' : 'text-black' }}">
                    <svg class="w-5 h-5 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                    </svg>
                    Dashboard
                </a>


                <!-- Products / Inventory Link -->
                <a href="{{ route('products.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl transition duration-150 font-medium text-sm hover:bg-sky-500 hover:text-black {{ request()->routeIs('products.*') ? 'bg-sky-500 text-black shadow-sm' : 'text-black' }}">
                    <svg class="w-5 h-5 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                    </svg>
                    Products (Inventory)
                </a>



                <!-- Users Management Link -->
                <a href="{{ route('users.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl transition duration-150 font-medium text-sm hover:bg-sky-500 hover:text-black {{ request()->routeIs('users.*') ? 'bg-sky-500 text-black shadow-sm' : 'text-black' }}">
                    <svg class="w-5 h-5 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                    Users Management
                </a>

                <!-- Customers Link -->
                <a href="{{ route('customers.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl transition duration-150 font-medium text-sm hover:bg-sky-500 hover:text-black {{ request()->routeIs('customers.*') ? 'bg-sky-500 text-black shadow-sm' : 'text-black' }}">
                    <svg class="w-5 h-5 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    Customers
                </a>
            </nav>

            <!-- Logout Section at Bottom -->
            <div class="p-4 bg-sky-700 border-t border-sky-500/30">
                <form action="/logout" method="POST">
                    @csrf
                    <button type="submit" class="w-full flex items-center justify-center gap-2 bg-red-600 hover:bg-red-700 text-white py-2.5 px-4 rounded-xl text-sm font-semibold transition duration-150 shadow-sm">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                        Logout
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main Content Area -->
        <div class="flex-1 flex flex-col overflow-y-auto">
            <!-- Top Header Navbar -->
            <header class="bg-white shadow-sm h-16 flex items-center justify-between px-8 border-b border-slate-200 z-10">
                <h2 class="text-lg font-bold text-slate-800 tracking-tight">Admin Panel</h2>

                <!-- User Profile Indicator -->
                <div class="flex items-center gap-3">
                    <span class="text-sm font-medium text-slate-600 bg-sky-50 text-sky-700 px-3 py-1.5 rounded-full border border-sky-100">Welcome, Admin</span>
                </div>
            </header>

            <!-- Dynamic Content Yield Section -->
            <main class="p-8">
                @yield('content')
            </main>
        </div>

    </div>
</body>

</html>