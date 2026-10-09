@extends('layouts.app')

@section('header-title', 'Invoices Management')

@section('content')
<div class="max-w-7xl mx-auto space-y-6">

    <!-- Header Bar -->
    <div class="bg-subtle p-6 rounded-3xl shadow-inner border border-border flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-black text-active tracking-tight">Invoice List</h1>
            <p class="text-sm text-muted mt-0.5">Manage customer billings and automatic stock deductions.</p>
        </div>
        <div>
            <a href="{{ route('invoices.create') }}" class="bg-slate-900 hover:bg-slate-950 text-white px-5 py-2.5 rounded-2xl font-bold text-sm shadow-md transition duration-150 flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4" />
                </svg>
                Create New Invoice
            </a>
        </div>
    </div>

    @if(session('success'))
    <div class="bg-slate-900 text-white px-5 py-4 rounded-2xl shadow-inner flex items-center gap-3">
        <span class="text-sm font-bold">{{ session('success') }}</span>
    </div>
    @endif

    <!-- Invoices Table -->
    <div class="bg-subtle rounded-3xl shadow-inner border border-border overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-border">
                <thead class="bg-canvas">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-bold text-muted uppercase tracking-wider">Invoice #</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-muted uppercase tracking-wider">Customer</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-muted uppercase tracking-wider">Total Amount</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-muted uppercase tracking-wider">Date</th>
                        <th class="px-6 py-4 text-right text-xs font-bold text-muted uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-border bg-subtle">
                    @forelse($invoices as $invoice)
                    <tr class="hover:bg-canvas/60 transition">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-black text-active">
                            {{ $invoice->invoice_number }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-bold text-slate-800">
                            {{ $invoice->customer->name ?? 'Walk-in' }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-black text-slate-950">
                            Rs. {{ number_format($invoice->total_amount, 2) }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-muted">
                            {{ $invoice->created_at->format('Y-m-d h:i A') }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <div class="flex items-center justify-end gap-2">
                                <a href="{{ route('invoices.show', $invoice->id) }}" class="bg-canvas hover:bg-border text-active px-3.5 py-1.5 rounded-xl text-xs font-bold transition border border-border shadow-inner">
                                    View / Print
                                </a>
                                <form action="{{ route('invoices.destroy', $invoice->id) }}" method="POST" class="inline" onsubmit="return confirm('Delete invoice and restore stock?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-slate-800 hover:bg-slate-950 text-white px-3.5 py-1.5 rounded-xl text-xs font-bold transition shadow-sm">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-12 text-center text-sm text-muted">
                            <p class="font-bold text-active text-base">No invoices created yet.</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection