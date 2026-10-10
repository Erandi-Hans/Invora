@extends('layouts.app')

@section('header-title', 'Invoices')

@section('content')
<div class="max-w-6xl mx-auto space-y-6">

    <!-- Header Section -->
    <div class="bg-subtle rounded-3xl shadow-inner border border-border p-6 flex items-center justify-between">
        <div>
            <h2 class="text-xl font-black text-active">Invoice List</h2>
            <p class="text-xs text-muted mt-0.5">Manage customer billings and automatic stock deductions.</p>
        </div>
        <a href="{{ route('invoices.create') }}" class="bg-slate-900 hover:bg-slate-950 text-white px-5 py-2.5 rounded-2xl font-bold text-xs shadow-md transition flex items-center gap-2">
            <span>+</span> Create New Invoice
        </a>
    </div>

    @if(session('success'))
    <div class="p-4 bg-slate-900 text-white rounded-2xl text-xs font-bold shadow-md">
        {{ session('success') }}
    </div>
    @endif

    <!-- Invoices Table -->
    <div class="bg-subtle rounded-3xl shadow-inner border border-border overflow-hidden">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="border-b border-border text-[10px] font-black uppercase tracking-wider text-muted bg-canvas/50">
                    <th class="py-4 px-6">Invoice #</th>
                    <th class="py-4 px-6">Customer</th>
                    <th class="py-4 px-6">Total Amount</th>
                    <th class="py-4 px-6">Date</th>
                    <th class="py-4 px-6 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-border text-xs font-semibold text-active">
                @forelse($invoices as $invoice)
                <tr class="hover:bg-canvas/30 transition">
                    <td class="py-4 px-6 font-bold">{{ $invoice->invoice_number }}</td>
                    <td class="py-4 px-6">{{ $invoice->customer->name ?? 'N/A' }}</td>
                    <td class="py-4 px-6 font-extrabold text-slate-900">Rs. {{ number_format($invoice->total_amount, 2) }}</td>
                    <td class="py-4 px-6 text-muted">{{ $invoice->created_at->format('Y-m-d h:i A') }}</td>
                    <td class="py-4 px-6 text-right space-x-2">
                        <a href="{{ route('invoices.show', $invoice->id) }}" target="_blank" class="px-3 py-1.5 bg-canvas hover:bg-border text-active rounded-xl border border-border text-xs font-bold transition">
                            View / Print
                        </a>
                        <button type="button" onclick="openDeleteModal('{{ route('invoices.destroy', $invoice->id) }}', '{{ $invoice->invoice_number }}')" class="px-3 py-1.5 bg-slate-900 hover:bg-slate-950 text-white rounded-xl text-xs font-bold transition shadow-sm">
                            Delete
                        </button>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="py-8 text-center text-muted font-medium">No invoices created yet.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>

<!-- Professional Backdrop Blurred Modal for Delete Confirmation -->
<div id="deleteModal" class="fixed inset-0 bg-slate-950/60 backdrop-blur-sm hidden items-center justify-center z-50 p-4 transition-all">
    <div class="bg-subtle border border-border rounded-3xl p-6 max-w-md w-full shadow-2xl space-y-5">
        <div class="space-y-2">
            <h3 class="text-lg font-black text-active">Are you sure?</h3>
            <p class="text-xs text-muted leading-relaxed">
                You are about to delete invoice <span id="modalInvoiceNo" class="font-bold text-active"></span>. This action will automatically <span class="font-bold text-slate-900 underline">restock the products</span> associated with this invoice.
            </p>
        </div>

        <form id="deleteForm" method="POST" action="">
            @csrf
            @method('DELETE')
            <div class="flex items-center justify-end gap-3 pt-2">
                <button type="button" onclick="closeDeleteModal()" class="px-4 py-2.5 bg-canvas hover:bg-border text-active border border-border rounded-2xl text-xs font-bold transition">
                    Cancel
                </button>
                <button type="submit" class="px-5 py-2.5 bg-slate-900 hover:bg-slate-950 text-white rounded-2xl text-xs font-bold shadow-md transition">
                    Yes, Delete & Restock
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    function openDeleteModal(actionUrl, invoiceNo) {
        document.getElementById('deleteForm').action = actionUrl;
        document.getElementById('modalInvoiceNo').innerText = invoiceNo;
        const modal = document.getElementById('deleteModal');
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }

    function closeDeleteModal() {
        const modal = document.getElementById('deleteModal');
        modal.classList.remove('flex');
        modal.classList.add('hidden');
    }
</script>
@endsection