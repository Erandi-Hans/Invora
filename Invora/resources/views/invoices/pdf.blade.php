<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Invoice - {{ $invoice->invoice_number }}</title>
    <style>
        body {
            font-family: 'Helvetica', 'Arial', sans-serif;
            font-size: 12px;
            color: #1e293b;
            padding: 20px;
        }

        .header {
            margin-bottom: 25px;
            border-bottom: 2px solid #e2e8f0;
            padding-bottom: 15px;
        }

        .company-title {
            font-size: 22px;
            font-weight: bold;
            color: #0f172a;
        }

        .invoice-details {
            margin-bottom: 20px;
            line-height: 1.6;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        .table th {
            background-color: #f8fafc;
            text-align: left;
            padding: 10px;
            font-size: 10px;
            text-transform: uppercase;
            border-bottom: 1px solid #cbd5e1;
        }

        .table td {
            padding: 10px;
            border-bottom: 1px solid #e2e8f0;
        }

        .total-section {
            text-align: right;
            margin-top: 25px;
            font-size: 16px;
            font-weight: bold;
        }
    </style>
</head>

<body>

    <div class="header">
        <div class="company-title">INVORA POS</div>
        <p style="margin: 3px 0; color: #64748b; font-size: 10px;">Official Sales & Inventory Invoice</p>
    </div>

    <div class="invoice-details">
        <h3 style="margin-bottom: 5px;">Invoice #: {{ $invoice->invoice_number }}</h3>
        <p><strong>Date:</strong> {{ $invoice->created_at->format('Y-m-d h:i A') }}</p>
        <p><strong>Billed To:</strong> {{ $invoice->customer->name ?? 'N/A' }}</p>
        <p><strong>Phone:</strong> {{ $invoice->customer->phone ?? 'N/A' }}</p>
        <p><strong>Address:</strong> {{ $invoice->customer->address ?? 'N/A' }}</p>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>Item Description</th>
                <th>Qty</th>
                <th>Unit Price</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($invoice->items as $item)
            <tr>
                <td>{{ $item->product->name ?? 'Product' }}</td>
                <td>{{ $item->quantity }}</td>
                <td>Rs. {{ number_format($item->price, 2) }}</td>
                <td>Rs. {{ number_format($item->subtotal, 2) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="total-section">
        Grand Total: Rs. {{ number_format($invoice->total_amount, 2) }}
    </div>

</body>

</html>