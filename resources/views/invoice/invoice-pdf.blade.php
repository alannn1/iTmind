<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }
        .invoice-container {
            width: 100%;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .invoice-header {
            display: table;
            width: 100%;
            margin-bottom: 20px;
            padding-bottom: 5rem;
        }
        .invoice-header img {
            float: left;
            width: 80px;
        }
        .midtrans-img{
            object-fit: cover;
            width: 100px;
        }
        .invoice-header h2 {
            float: right;
            font-size: 24px;
        }
        .detail-right{
            float: right;
        }
        .time{
            float: right;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
        }
        .table th, .table td {
            padding: 10px;
            border: 1px solid #ddd;
        }
        .text-right {
            text-align: right;
        }
        .font-bold {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="invoice-container">
        <div class="invoice-header" style="width: 100%; overflow: hidden; margin-bottom: 20px;">
            <div style="display: inline-block; width: 50%;">
                <img src="{{ public_path('img/itmind.png') }}" alt="Logo" style="width: 100px;">
            </div>
            <div style="display: inline-block; width: 50%; text-align: center;">
                <img src="{{ public_path('img/midtrans.png') }}" alt="Midtrans" style="width: 100px;">
            </div>
            <h2 style="text-align: right;">INVOICE</h2>
        </div>
        <hr>
        <div class="bill-to">
            <h2 class="font-bold">Bill To:</h2>
            <div class="detail-right">
                <p>Invoice#: {{$checkout->id}}</p>
                <p>Date: {{$checkout->created_at}}</p>
            </div>
            <p>{{ $checkout->email }}</p>
            <p>{{ $checkout->alamat }}</p>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>Description</th>
                    <th class="text-right">Amount</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Kelas Bisnis</td>
                    <td class="text-right">Rp{{ number_format($checkout->total_price, 0, ',', '.') }}</td>
                </tr>
            </tbody>
        </table>
        <h2>Status pembayaran: {{ $checkout->status }}</h2>
        <p>Thank you for your business!</p>
        <p>Please keep this invoice as proof your payment!</p>
    </div>
</body>
</html>
