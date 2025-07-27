<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Invoice #{{ $payment->invoice_number }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
            line-height: 1.6;
            color: #333;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        .header h1 {
            margin-bottom: 5px;
            color: #2563eb;
        }
        .invoice-details {
            border-top: 1px solid #ddd;
            border-bottom: 1px solid #ddd;
            padding: 15px 0;
            margin-bottom: 20px;
        }
        .invoice-details .row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }
        .invoice-details .label {
            font-weight: bold;
            min-width: 150px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table th, table td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        table th {
            background-color: #f8fafc;
        }
        .total {
            text-align: right;
            margin-top: 30px;
            margin-bottom: 30px;
        }
        .total .amount {
            font-size: 18px;
            font-weight: bold;
            color: #2563eb;
        }
        .footer {
            margin-top: 50px;
            text-align: center;
            font-size: 12px;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>INVOICE PEMBAYARAN PLN</h1>
            <p>{{ now()->format('d/m/Y H:i:s') }}</p>
        </div>

        <div class="invoice-details">
            <div class="row">
                <span class="label">Nomor Invoice:</span>
                <span>{{ $payment->invoice_number }}</span>
            </div>
            <div class="row">
                <span class="label">Tanggal:</span>
                <span>{{ $payment->created_at->format('d/m/Y H:i') }}</span>
            </div>
            <div class="row">
                <span class="label">Nama Pelanggan:</span>
                <span>{{ $payment->user->name }}</span>
            </div>
            <div class="row">
                <span class="label">Email:</span>
                <span>{{ $payment->user->email }}</span>
            </div>
            <div class="row">
                <span class="label">Nomor Meteran:</span>
                <span>{{ $payment->meter_number }}</span>
            </div>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Deskripsi</th>
                    <th>Jumlah</th>
                    <th>Harga Per Unit</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Penggunaan Listrik</td>
                    <td>{{ number_format($payment->kwh_usage, 0, ',', '.') }} kWh</td>
                    <td>Rp {{ number_format($payment->price_per_kwh, 2, ',', '.') }}</td>
                    <td>Rp {{ number_format($payment->total_amount, 0, ',', '.') }}</td>
                </tr>
            </tbody>
        </table>

        <div class="total">
            <p>Total Pembayaran: <span class="amount">Rp {{ number_format($payment->total_amount, 0, ',', '.') }}</span></p>
            <p>Status: <strong>{{ ucfirst($payment->payment_status) }}</strong></p>
        </div>

        <div class="footer">
            <p>Terima kasih atas pembayaran Anda. Invoice ini merupakan bukti pembayaran resmi.</p>
            <p>© {{ date('Y') }} Sistem Pembayaran PLN. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
