@extends('layouts.app')

@section('header-title', 'Create Invoice')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">

    <div class="bg-subtle rounded-3xl shadow-inner border border-border p-8">
        <div class="flex items-center justify-between pb-6 border-b border-border">
            <div>
                <h2 class="text-xl font-black text-active">New Billing Invoice</h2>
                <p class="text-xs text-muted mt-0.5">Select customer and items. Inventory stock will automatically adjust.</p>
            </div>
            <a href="{{ route('invoices.index') }}" class="bg-canvas hover:bg-border text-active px-4 py-2 rounded-2xl font-bold text-xs border border-border shadow-inner transition">
                Back to List
            </a>
        </div>

        @if($errors->any())
        <div class="mt-4 p-4 bg-slate-900 text-white rounded-2xl text-xs font-bold">
            {{ $errors->first() }}
        </div>
        @endif

        <form action="{{ route('invoices.store') }}" method="POST" class="space-y-6 pt-6">
            @csrf

            <!-- Customer Selection -->
            <div class="space-y-2">
                <label class="block text-xs font-bold text-muted uppercase tracking-wider">Select Customer</label>
                <select name="customer_id" required class="w-full rounded-2xl border border-border bg-canvas px-4 py-3 text-sm font-semibold text-active focus:outline-none focus:border-slate-900 shadow-inner">
                    <option value="">-- Choose Customer --</option>
                    @foreach($customers as $customer)
                    <option value="{{ $customer->id }}">{{ $customer->name }} ({{ $customer->phone }})</option>
                    @endforeach
                </select>
            </div>

            <!-- Single Product Row (Simplified to avoid loop errors) -->
            <div class="space-y-3">
                <label class="block text-xs font-bold text-muted uppercase tracking-wider">Select Product & Quantity</label>

                <div class="flex items-center gap-3 bg-canvas p-4 rounded-2xl border border-border shadow-inner">
                    <select name="products[0][id]" required class="flex-1 rounded-xl border border-border bg-subtle px-3 py-2 text-sm font-semibold text-active">
                        <option value="">-- Select Product --</option>
                        @foreach($products as $product)
                        <option value="{{ $product->id }}">{{ $product->name }} (Stock: {{ $product->quantity }} | Rs. {{ $product->price }})</option>
                        @endforeach
                    </select>
                    <input type="number" name="products[0][quantity]" placeholder="Qty" min="1" value="1" required class="w-24 rounded-xl border border-border bg-subtle px-3 py-2 text-sm font-semibold text-active">
                </div>
            </div>

            <!-- Actions -->
            <div class="flex items-center justify-end gap-3 pt-6 border-t border-border">
                <a href="{{ route('invoices.index') }}" class="px-5 py-3 bg-canvas text-active border border-border rounded-2xl font-bold text-xs transition shadow-inner">
                    Cancel
                </a>
                <button type="submit" class="px-8 py-3 bg-slate-900 hover:bg-slate-950 text-white rounded-2xl font-bold text-xs shadow-md transition">
                    Generate Invoice & Deduct Stock
                </button>
            </div>
        </form>
    </div>

</div>
@endsection