<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>Laporan Pemesanan</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #ccc; padding: 6px; text-align: left; }
        th { background: #f5f5f5; }
        .text-right { text-align: right; }
    </style>
</head>
<body>
    <h4>Laporan Pemesanan</h4>
    <p>Generated: {{ date('Y-m-d H:i') }}</p>

    <table>
        <thead>
            <tr>
                <th>No Pesanan</th>
                <th>Pelanggan</th>
                <th>Jasa</th>
                <th>Tanggal</th>
                <th>Status</th>
                <th class="text-right">Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reports as $r)
                <tr>
                    <td>{{ $r['order_no'] }}</td>
                    <td>{{ $r['customer'] }}</td>
                    <td>{{ $r['service'] }}</td>
                    <td>{{ $r['date'] }}</td>
                    <td>{{ $r['status'] }}</td>
                    <td class="text-right">{{ number_format($r['total'], 0, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <p style="margin-top:12px;"><strong>Total Pesanan:</strong> {{ $summary['total_orders'] }} &nbsp; <strong>Total Pendapatan:</strong> Rp {{ number_format($summary['total_revenue'],0,',','.') }}</p>
</body>
</html>
