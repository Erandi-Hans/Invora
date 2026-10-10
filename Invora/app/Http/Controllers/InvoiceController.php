<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\InvoiceItem;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the invoices.
     */
    public function index()
    {
        $invoices = Invoice::with('customer')->latest()->get();
        return view('invoices.index', compact('invoices'));
    }

    /**
     * Show the form for creating a new invoice.
     */
    public function create()
    {
        $customers = Customer::all();
        $products = Product::all();
        $invoiceNumber = 'INV-' . strtoupper(uniqid());
        return view('invoices.create', compact('customers', 'products', 'invoiceNumber'));
    }

    /**
     * Store a newly created invoice and reduce inventory stock.
     */
    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'products' => 'required|array|min:1',
            'products.*.id' => 'required|exists:products,id',
            'products.*.quantity' => 'required|integer|min:1',
        ]);

        DB::beginTransaction();

        try {
            $totalAmount = 0;

            // Calculate total and verify stock availability first
            foreach ($request->products as $item) {
                $product = Product::findOrFail($item['id']);
                if ($product->quantity < $item['quantity']) {
                    return back()->withErrors("Insufficient stock for product: {$product->name}. Available: {$product->quantity}");
                }
                $totalAmount += $product->price * $item['quantity'];
            }

            // Create Invoice Header
            $invoice = Invoice::create([
                'invoice_number' => 'INV-' . rand(100000, 999999),
                'customer_id' => $request->customer_id,
                'total_amount' => $totalAmount,
            ]);

            // Create Invoice Items and Deduct Stock Quantity
            foreach ($request->products as $item) {
                $product = Product::findOrFail($item['id']);
                $quantity = $item['quantity'];
                $price = $product->price;
                $subtotal = $price * $quantity;

                InvoiceItem::create([
                    'invoice_id' => $invoice->id,
                    'product_id' => $product->id,
                    'quantity' => $quantity,
                    'price' => $price,
                    'subtotal' => $subtotal,
                ]);

                // Reduce inventory quantity
                $product->decrement('quantity', $quantity);
            }

            DB::commit();

            return redirect()->route('invoices.show', $invoice->id)->with('success', 'Invoice generated successfully and inventory updated.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors('Error generating invoice: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified invoice details (Print/Download Ready).
     */
    public function show(Invoice $invoice)
    {
        $invoice->load('customer', 'items.product');
        return view('invoices.show', compact('invoice'));
    }

    /**
     * Remove invoice and restore stock back.
     */
    public function destroy($id)
    {
        DB::transaction(function () use ($id) {
            $invoice = Invoice::with('items')->findOrFail($id);

            // Restore product stock quantity
            foreach ($invoice->items as $item) {
                $product = Product::find($item->product_id);
                if ($product) {
                    $product->increment('quantity', $item->quantity);
                }
            }

            // Delete invoice and items
            $invoice->items()->delete();
            $invoice->delete();
        });

        return redirect()->route('invoices.index')->with('success', 'Invoice deleted and stock restored successfully!');
    }
    /**
     * Download Invoice as HTML-based PDF stream/download.
     */
    public function downloadPdf($id)
    {
        $invoice = Invoice::with(['customer', 'items.product'])->findOrFail($id);

        $html = view('invoices.show', compact('invoice'))->render();

        // Print dialog auto-trigger and clean dynamic download title
        $html .= '<script>window.onload = function() { window.print(); };</script>';

        return response($html)
            ->header('Content-Type', 'text/html');
    }
}
