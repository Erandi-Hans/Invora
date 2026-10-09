@extends('layouts.app')

@section('header-title', 'Invoice Details')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">

    <!-- Action Toolbar (Hidden during print) -->
    <div class="flex items-center justify-between bg-subtle p-4 rounded-2xl border border-border shadow-inner print:hidden">
        <a href="{{ route('invoices.index') }}" class="bg-canvas hover:bg-border text-active px-4 py-2 rounded-xl font-bold text-xs border border-border transition">
            &larr; Back to Invoices
        </a>
        <button onclick="window.print()" class="bg-slate-900 hover:bg-slate-950 text-white px-6 py-2.5 rounded-xl font-bold text-xs shadow-md transition flex items-center gap-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
            </svg>
            Print / Save as PDF
        </button>
    </div>

    <!-- Printable Invoice Receipt Box -->
    <div id="printable-invoice" class="bg-white text-slate-900 rounded-3xl shadow-xl border border-slate-200 p-10 space-y-8">

        <!-- Company & Invoice Header -->
        <div class="flex justify-between items-start border-b border-slate-100 pb-8">
            <div>
                <h1 class="text-2xl font-black tracking-wider text-slate-900">INVORA POS</h1>
                <p class="text-xs text-slate-500 mt-1">Official Sales & Inventory Invoice</p>
            </div>
            <div class="text-right space-y-1">
                <h2 class="text-lg font-black text-slate-900">{{ $invoice->invoice_number }}</h2>
                <p class="text-xs text-slate-500 font-semibold">Date: {{ $invoice->created_at->format('F d, Y - h:i A') }}</p>
            </div>
        </div>

        <!-- Customer Info -->
        <div class="bg-slate-50 p-5 rounded-2xl border border-slate-100 flex justify-between">
            <div>
                <span class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Billed To:</span>
                <h3 class="text-base font-black text-slate-900 mt-0.5">{{ $invoice->customer->name ?? 'Walk-in Customer' }}</h3>
                <p class="text-xs text-slate-600 mt-0.5">Phone: {{ $invoice->customer->phone ?? 'N/A' }}</p>
                <p class="text-xs text-slate-600">Address: {{ $invoice->customer->address ?? 'N/A' }}</p>
            </div>
        </div>

        <!-- Items Table -->
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-slate-200">
                <thead>
                    <tr class="bg-slate-50 text-slate-700 text-xs font-bold uppercase">
                        <th class="px-4 py-3 text-left">Item Description</th>
                        <th class="px-4 py-3 text-center">Qty</th>
                        <th class="px-4 py-3 text-right">Unit Price</th>
                        <th class="px-4 py-3 text-right">Subtotal</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-sm">
                    @foreach($invoice->items as $item)
                    <tr>
                        <td class="px-4 py-3 font-bold text-slate-800">{{ $item->product->name ?? 'Product' }}</td>
                        <td class="px-4 py-3 text-center font-semibold text-slate-600">{{ $item->quantity }}</td>
                        <td class="px-4 py-3 text-right text-slate-600">Rs. {{ number_format($item->price, 2) }}</td>
                        <td class="px-4 py-3 text-right font-black text-slate-900">Rs. {{ number_format($item->subtotal, 2) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Totals Summary -->
        <div class="flex justify-end pt-4 border-t border-slate-100">
            <div class="w-64 space-y-2">
                <div class="flex justify-between text-base font-black text-slate-900 bg-slate-100 p-3 rounded-xl">
                    <span>Grand Total:</span>
                    <span>Rs. {{ number_format($invoice->total_amount, 2) }}</span>
                </div>
            </div>
        </div>

        <!-- Footer Note -->
        <div class="text-center pt-8 border-t border-slate-100 text-xs text-slate-400">
            <p>Thank you for your business! Computer generated invoice.</p>
        </div>

    </div>

</div>

<!-- Print Stylesheet rules -->
<style>
    @media print {
        body * {
            visibility: hidden;
        }

        #printable-invoice,
        #printable-invoice * {
            visibility: visible;
        }

        #printable-invoice {
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            border: none;
            box-shadow: none;
            padding: 0;
        }
    }
</style>
@endsection