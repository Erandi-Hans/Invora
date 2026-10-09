@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto space-y-6">

    <!-- Page Header Bar -->
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 bg-white p-6 rounded-2xl shadow-sm border border-slate-200">
        <div>
            <h1 class="text-2xl font-bold text-slate-900 tracking-tight">Product Details</h1>
            <p class="text-sm text-slate-600 mt-0.5">Complete specifications and stock info for this item.</p>
        </div>
        <div>
            <a href="{{ route('products.index') }}" class="bg-slate-100 hover:bg-slate-200 text-slate-700 px-4 py-2.5 rounded-xl font-bold text-xs transition">
                Back to List
            </a>
        </div>
    </div>

    <!-- Product Details Card -->
    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-8 space-y-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pb-6 border-b border-slate-100">
            <div>
                <p class="text-xs font-bold text-slate-400 uppercase tracking-wider">Product Name</p>
                <h3 class="text-lg font-bold text-slate-900 mt-1">{{ $product->name }}</h3>
            </div>
            <div>
                <p class="text-xs font-bold text-slate-400 uppercase tracking-wider">Product Code / SKU</p>
                <p class="text-sm font-semibold text-slate-700 mt-1"><span class="bg-slate-100 text-slate-800 px-2.5 py-1 rounded-lg text-xs font-bold">{{ $product->code }}</span></p>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 pb-6 border-b border-slate-100">
            <div>
                <p class="text-xs font-bold text-slate-400 uppercase tracking-wider">Cost Price</p>
                <p class="text-base font-semibold text-slate-700 mt-1">Rs. {{ number_format($product->cost, 2) }}</p>
            </div>
            <div>
                <p class="text-xs font-bold text-slate-400 uppercase tracking-wider">Selling Price</p>
                <p class="text-base font-bold text-emerald-600 mt-1">Rs. {{ number_format($product->price, 2) }}</p>
            </div>
            <div>
                <p class="text-xs font-bold text-slate-400 uppercase tracking-wider">Stock Quantity</p>
                <p class="text-base font-bold text-slate-800 mt-1">
                    <span class="px-3 py-1 rounded-full text-xs font-bold {{ $product->quantity > 5 ? 'bg-sky-100 text-sky-800' : 'bg-amber-100 text-amber-800' }}">
                        {{ $product->quantity }} Units
                    </span>
                </p>
            </div>
        </div>

        <div>
            <p class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Description</p>
            <div class="bg-slate-50 p-4 rounded-xl border border-slate-200 text-sm text-slate-700 font-medium leading-relaxed">
                {{ $product->description ?: 'No description provided for this product.' }}
            </div>
        </div>

        <div class="flex items-center justify-end gap-3 pt-6 border-t border-slate-200">
            <a href="{{ route('products.edit', $product->id) }}" class="px-6 py-2.5 bg-slate-900 hover:bg-slate-800 text-white rounded-xl font-bold text-xs shadow-sm transition">
                Edit Product
            </a>
        </div>
    </div>

</div>
@endsection