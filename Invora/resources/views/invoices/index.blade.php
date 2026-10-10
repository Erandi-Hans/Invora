@extends('layouts.app')

@section('header-title', 'Invoices')

@section('content')
<div class="max-w-6xl mx-auto space-y-6">

    <!-- Header Section -->
    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6 flex items-center justify-between">
        <div>
            <h2 class="text-xl font-bold text-slate-800">Invoice List</h2>
            <p class="text-xs text-slate-500 mt-0.5">Manage customer billings and automatic stock deductions.</p>
        </div>
        <a href="{{ route('invoices.create') }}" class="bg-slate-900 hover:bg-black text-white px-5 py-2.5 rounded-xl font-bold text-xs transition flex items-center gap-2">
            <span>+</span> Create New Invoice
        </a>
    </div>

    @if(session('success'))
    <div class="p-4 bg-emerald-500 text-white rounded-xl text-xs font-bold shadow-sm">
        {{ session('success') }}
    </div>
    @endif

    <!-- Table Section -->
    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="border-b border-slate-200 text-[11px] font-bold uppercase tracking-wider text-slate-400 bg-slate-50/50">
                    <th class="py-4 px-6">Invoice #</th>
                    <th class="py-4 px-6">Customer</th>
                    <th class="py-4 px-6">Total Amount</th>
                    <th class="py-4 px-6">Date</th>
                    <th class="py-4 px-6 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100 text-xs font-semibold text-slate-700">
                @forelse($invoices as $invoice)
                <tr class="hover:bg-slate-50/50 transition">
                    <td class="py-4 px-6 font-bold text-slate-900">{{ $invoice->invoice_number }}</td>
                    <td class="py-4 px-6">{{ $invoice->customer->name ?? 'N/A' }}</td>
                    <td class="py-4 px-6 font-bold text-slate-900">Rs. {{ number_format($invoice->total_amount, 2) }}</td>
                    <td class="py-4 px-6 text-slate-400">{{ $invoice->created_at->format('Y-m-d h:i A') }}</td>
                    <td class="py-4 px-6 text-right space-x-1.5">
                        <a href="{{ route('invoices.show', $invoice->id) }}" target="_blank" class="px-3 py-1.5 bg-slate-100 hover:bg-slate-200 text-slate-600 rounded-lg text-xs font-bold transition">
                            View
                        </a>
                        <a href="{{ route('invoices.download', $invoice->id) }}" target="_blank" class="px-3 py-1.5 bg-sky-500 hover:bg-sky-600 text-white rounded-lg text-xs font-bold transition">
                            Download PDF
                        </a>
                        <button type="button"
                            data-url="{{ route('invoices.destroy', $invoice->id) }}"
                            data-number="{{ $invoice->invoice_number }}"
                            onclick="openDeleteModal(this.getAttribute('data-url'), this.getAttribute('data-number'))"
                            class="px-3 py-1.5 bg-rose-600 hover:bg-rose-700 text-white rounded-lg text-xs font-bold transition">
                            Delete
                        </button>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="py-8 text-center text-slate-400">No invoices found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>

<!-- Delete Confirmation Modal (Exact Match with Customers Modal) -->
<div id="deleteModal" class="fixed inset-0 bg-slate-900/40 backdrop-blur-sm hidden items-center justify-center z-50 p-4 transition-all">
    <div class="bg-white rounded-2xl p-6 max-w-md w-full shadow-2xl space-y-4 border border-slate-100">

        <div class="flex items-start gap-3">
            <div class="w-10 h-10 rounded-full bg-rose-100 text-rose-500 flex items-center justify-center shrink-0 text-lg font-bold">
                ⚠️
            </div>
            <div>
                <h3 class="text-base font-bold text-slate-900">Delete Invoice</h3>
                <p class="text-xs text-slate-500 mt-1 leading-relaxed">
                    Are you sure you want to delete invoice <span id="modalInvoiceNo" class="font-bold text-slate-800"></span>? Choose whether you want to return items back to stock inventory or delete without restocking.
                </p>
            </div>
        </div>

        <form id="deleteForm" method="POST" action="">
            @csrf
            @method('DELETE')
            <input type="hidden" name="restock" id="restockInput" value="1">

            <div class="flex flex-col sm:flex-row items-center justify-end gap-2 pt-3 border-t border-slate-100">
                <button type="button" onclick="closeDeleteModal()" class="w-full sm:w-auto px-4 py-2 bg-slate-100 hover:bg-slate-200 text-slate-600 rounded-xl text-xs font-bold transition">
                    Cancel
                </button>

                <button type="button" onclick="submitDelete(0)" class="w-full sm:w-auto px-4 py-2 bg-slate-800 hover:bg-slate-900 text-white rounded-xl text-xs font-bold transition">
                    Delete Only
                </button>

                <button type="button" onclick="submitDelete(1)" class="w-full sm:w-auto px-4 py-2 bg-rose-600 hover:bg-rose-700 text-white rounded-xl text-xs font-bold shadow-sm transition">
                    Restock & Delete
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

    function submitDelete(restockValue) {
        document.getElementById('restockInput').value = restockValue;
        document.getElementById('deleteForm').submit();
    }
</script>
@endsection