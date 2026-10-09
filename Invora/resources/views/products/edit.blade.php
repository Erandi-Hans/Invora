@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto space-y-6">

    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 bg-white p-6 rounded-2xl shadow-sm border border-slate-200">
        <div>
            <h1 class="text-2xl font-bold text-slate-900 tracking-tight">Edit Product</h1>
            <p class="text-sm text-slate-600 mt-0.5">Update product specifications and inventory details below.</p>
        </div>
        <div>
            <a href="{{ route('products.index') }}" class="bg-slate-100 hover:bg-slate-200 text-slate-700 px-4 py-2.5 rounded-xl font-bold text-xs transition">
                Back to List
            </a>
        </div>
    </div>

    @if($errors->any())
    <div class="bg-rose-50 border border-rose-200 text-rose-800 px-5 py-4 rounded-xl shadow-sm">
        <p class="font-bold text-xs uppercase tracking-wider mb-1">Please fix the following errors:</p>
        <ul class="list-disc list-inside text-sm space-y-0.5 font-semibold">
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
        <form action="{{ route('products.update', $product->id) }}" method="POST" class="p-8 space-y-6">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-slate-700 text-xs font-bold uppercase tracking-wider mb-2">Product Name</label>
                    <input type="text" name="name" value="{{ old('name', $product->name) }}" required class="w-full px-4 py-3 bg-slate-50 border border-slate-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-slate-900 focus:bg-white text-sm font-semibold text-slate-900 transition">
                </div>

                <div>
                    <label class="block text-slate-700 text-xs font-bold uppercase tracking-wider mb-2">Product Code / SKU</label>
                    <input type="text" name="code" value="{{ old('code', $product->code) }}" required class="w-full px-4 py-3 bg-slate-50 border border-slate-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-slate-900 focus:bg-white text-sm font-semibold text-slate-900 transition">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div>
                    <label class="block text-slate-700 text-xs font-bold uppercase tracking-wider mb-2">Cost Price (Rs.)</label>
                    <input type="number" step="0.01" name="cost" value="{{ old('cost', $product->cost) }}" required class="w-full px-4 py-3 bg-slate-50 border border-slate-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-slate-900 focus:bg-white text-sm font-semibold text-slate-900 transition">
                </div>

                <div>
                    <label class="block text-slate-700 text-xs font-bold uppercase tracking-wider mb-2">Selling Price (Rs.)</label>
                    <input type="number" step="0.01" name="price" value="{{ old('price', $product->price) }}" required class="w-full px-4 py-3 bg-slate-50 border border-slate-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-slate-900 focus:bg-white text-sm font-semibold text-slate-900 transition">
                </div>

                <div>
                    <label class="block text-slate-700 text-xs font-bold uppercase tracking-wider mb-2">Stock Quantity</label>
                    <input type="number" name="quantity" value="{{ old('quantity', $product->quantity) }}" required class="w-full px-4 py-3 bg-slate-50 border border-slate-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-slate-900 focus:bg-white text-sm font-semibold text-slate-900 transition">
                </div>
            </div>

            <div>
                <label class="block text-slate-700 text-xs font-bold uppercase tracking-wider mb-2">Description (Optional)</label>
                <textarea name="description" rows="3" class="w-full px-4 py-3 bg-slate-50 border border-slate-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-slate-900 focus:bg-white text-sm font-semibold text-slate-900 transition">{{ old('description', $product->description) }}</textarea>
            </div>

            <div class="flex items-center justify-end gap-3 pt-6 border-t border-slate-200">
                <a href="{{ route('products.index') }}" class="px-5 py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-700 rounded-xl font-bold text-sm transition">
                    Cancel
                </a>
                <button type="submit" class="px-6 py-2.5 bg-slate-900 hover:bg-slate-800 text-white rounded-xl font-bold text-sm shadow-sm transition">
                    Update Product
                </button>
            </div>
        </form>
    </div>

</div>
@endsection