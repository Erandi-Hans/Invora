@extends('layouts.app')

@section('content')
<div class="space-y-6">

    <!-- Page Header Bar with Title on Left and Add Button on Right -->
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 bg-white p-6 rounded-2xl shadow-sm border border-slate-200">
        <div>
            <h1 class="text-2xl font-bold text-slate-900 tracking-tight">Inventory Management</h1>
            <p class="text-sm text-slate-600 mt-0.5">Manage your stock, prices, and product catalogs efficiently.</p>
        </div>
        <div>
            <a href="{{ route('products.create') }}" class="bg-slate-900 hover:bg-slate-800 text-white px-5 py-2.5 rounded-xl font-semibold text-sm shadow-sm transition duration-150 flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Add New Product
            </a>
        </div>
    </div>



    <!-- Success Alert Notification -->
    @if(session('success'))
    <div class="bg-emerald-50 border border-emerald-200 text-emerald-800 px-5 py-4 rounded-xl shadow-sm flex items-center gap-3">
        <svg class="w-5 h-5 text-emerald-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
        </svg>
        <span class="text-sm font-medium">{{ session('success') }}</span>
    </div>
    @endif

    <!-- Products Table Card -->
    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-slate-200">
                <thead class="bg-slate-50">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-bold text-slate-700 uppercase tracking-wider">Product Name</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-slate-700 uppercase tracking-wider">Code</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-slate-700 uppercase tracking-wider">Cost Price</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-slate-700 uppercase tracking-wider">Selling Price</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-slate-700 uppercase tracking-wider">Quantity</th>
                        <th class="px-6 py-4 text-right text-xs font-bold text-slate-700 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200 bg-white">
                    @forelse($products as $product)
                    <tr class="hover:bg-slate-50/60 transition duration-150">
                        <td class="px-6 py-4 whitespace-nowrap text-base font-bold text-slate-900">
                            {{ $product->name }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-700 font-medium">
                            <span class="bg-slate-100 text-slate-800 px-2.5 py-1 rounded-lg text-xs font-bold">{{ $product->code }}</span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-700 font-semibold">
                            Rs. {{ number_format($product->cost, 2) }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-bold text-emerald-600">
                            Rs. {{ number_format($product->price, 2) }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                            <span class="px-3 py-1 rounded-full text-xs font-bold {{ $product->quantity > 5 ? 'bg-sky-100 text-sky-800' : 'bg-amber-100 text-amber-800' }}">
                                {{ $product->quantity }} Units
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <div class="flex items-center justify-end gap-2">
                                <!-- View Details Button -->
                                <a href="{{ route('products.show', $product->id) }}" class="bg-slate-100 hover:bg-slate-200 text-slate-700 px-3 py-1.5 rounded-lg text-xs font-bold transition shadow-sm">
                                    View
                                </a>
                                <!-- Edit Button -->
                                <a href="{{ route('products.edit', $product->id) }}" class="bg-sky-500 hover:bg-sky-600 text-white px-3.5 py-1.5 rounded-lg text-xs font-bold shadow-sm transition">
                                    Edit
                                </a>

                                <!-- Trigger Custom Delete Modal Button with Data Attribute -->
                                <button type="button" data-url="{{ route('products.destroy', $product->id) }}" onclick="openDeleteModal(this)" class="bg-rose-600 hover:bg-rose-700 text-white px-3.5 py-1.5 rounded-lg text-xs font-bold shadow-sm transition">
                                    Delete
                                </button>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-6 py-12 text-center text-sm text-slate-500">
                            <div class="flex flex-col items-center justify-center space-y-2">
                                <span class="text-4xl">📦</span>
                                <p class="font-bold text-slate-700 text-base">No products found in inventory.</p>
                                <p class="text-xs text-slate-500">Click on 'Add New Product' to start adding items.</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>

<!-- Custom Modern Blur Delete Confirmation Modal -->
<div id="deleteModal" class="fixed inset-0 z-50 flex items-center justify-center bg-slate-900/40 backdrop-blur-sm hidden">
    <div class="bg-white rounded-2xl shadow-xl max-w-md w-full p-6 mx-4 border border-slate-200 transform transition-all space-y-4">
        <div class="flex items-center gap-3">
            <div class="w-12 h-12 rounded-full bg-rose-100 text-rose-600 flex items-center justify-center font-bold text-xl flex-shrink-0">
                ⚠️
            </div>
            <div>
                <h3 class="text-lg font-bold text-slate-900">Delete Product</h3>
                <p class="text-xs text-slate-500">Are you sure you want to delete this product? This action cannot be undone.</p>
            </div>
        </div>

        <div class="flex items-center justify-end gap-3 pt-4 border-t border-slate-100">
            <button type="button" onclick="closeDeleteModal()" class="px-4 py-2 bg-slate-100 hover:bg-slate-200 text-slate-700 rounded-xl font-bold text-xs transition">
                Cancel
            </button>
            <form id="deleteForm" method="POST" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="px-4 py-2 bg-rose-600 hover:bg-rose-700 text-white rounded-xl font-bold text-xs shadow-sm transition">
                    Yes, Delete
                </button>
            </form>
        </div>
    </div>
</div>

<!-- JavaScript for Modal Handling -->
<script>
    function openDeleteModal(button) {
        // Get URL from data-url attribute
        const deleteUrl = button.getAttribute('data-url');
        const modal = document.getElementById('deleteModal');
        const form = document.getElementById('deleteForm');

        form.action = deleteUrl;
        modal.classList.remove('hidden');
    }

    function closeDeleteModal() {
        const modal = document.getElementById('deleteModal');
        modal.classList.add('hidden');
    }
</script>
@endsection