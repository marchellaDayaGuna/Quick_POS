<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struk Penjualan</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .header { text-align: center; margin-bottom: 20px; }
        .details { margin-bottom: 20px; }
        .table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        .table th, .table td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        .table th { background-color: #f4f4f4; }
        .total { text-align: right; }
    </style>
</head>
<body>
    <div class="header">
        <h2>Struk Penjualan Quick POS</h2>
        <p>Tanggal: {{ $penjualan->created_at->format('d-m-Y H:i') }}</p>
        <p>Kasir: {{ $penjualan->user->name }}</p>
    </div>

    <div class="details">
        <p><strong>ID Penjualan:</strong> {{ $penjualan->id }}</p>
        <p><strong>Total Harga:</strong> Rp {{ number_format($penjualan->total_harga, 0, ',', '.') }}</p>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>Nama Produk</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($penjualan->produkPenjualan as $detail)
            <tr>
                <td>{{ $detail->produk->nama_produk }}</td>
                <td>Rp {{ number_format($detail->produk->harga_produk, 0, ',', '.') }}</td>
                <td>{{ $detail->quantity }}</td>
                <td>Rp {{ number_format($detail->sub_total, 0, ',', '.') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="total">
        <h3>Total: Rp {{ number_format($penjualan->total_harga, 0, ',', '.') }}</h3>
    </div>
</body>
</html>
