<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invora - POS & Inventory System</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 font-sans antialiased">
    <div class="flex h-screen overflow-hidden">

        <!-- Sidebar -->
        <div class="w-64 bg-indigo-800 text-white flex flex-col">
            <div class="p-5 text-2xl font-bold tracking-wider text-center border-b border-indigo-700">
                Invora POS
            </div>
            <nav class="flex-1 p-4 space-y-2">
                <a href="/dashboard" class="block px-4 py-2.5 rounded transition hover:bg-indigo-700 font-medium">Dashboard</a>
                <a href="{{ route('products.index') }}" class="block px-4 py-2.5 rounded transition hover:bg-indigo-700 font-medium">Products (Inventory)</a>
                <nav class="flex-1 p-4 space-y-2">
                    <a href="/dashboard" class="block px-4 py-2.5 rounded transition hover:bg-indigo-700 font-medium">Dashboard</a>
                    <a href="{{ route('products.index') }}" class="block px-4 py-2.5 rounded transition hover:bg-indigo-700 font-medium">Products (Inventory)</a>
                    <a href="{{ route('users.index') }}" class="block px-4 py-2.5 rounded transition hover:bg-indigo-700 font-medium">Users Management</a>
                </nav>
            </nav>
            <div class="p-4 border-t border-indigo-700">
                <form action="/logout" method="POST">
                    @csrf
                    <button type="submit" class="w-full bg-red-600 hover:bg-red-700 text-white py-2 rounded text-center font-bold">Logout</button>
                </form>
            </div>
        </div>

        <!-- Main Content Area -->
        <div class="flex-1 flex flex-col overflow-y-auto">
            <!-- Top Header -->
            <header class="bg-white shadow-sm h-16 flex items-center justify-between px-8">
                <h2 class="text-xl font-semibold text-gray-800">Admin Panel</h2>
                <span class="text-sm text-gray-600">Welcome, Admin</span>
            </header>

            <!-- Dynamic Content -->
            <main class="p-8">
                @yield('content')
            </main>
        </div>

    </div>
</body>

</html>