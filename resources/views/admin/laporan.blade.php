@extends('layouts.main')

@section('content')
<div class="container mt-4">
    <h3>Laporan Penjualan</h3>

    <!-- Form untuk memilih laporan -->
    <form action="{{ route('admin.laporan') }}" method="GET" class="form-inline mb-4">
        <label for="filter" class="mr-2">Pilih Laporan:</label>
        <select name="filter" id="filter" class="form-control mr-2" onchange="this.form.submit()">
            <option value="daily" {{ request('filter') == 'daily' ? 'selected' : '' }}>Harian</option>
            <option value="monthly" {{ request('filter') == 'monthly' ? 'selected' : '' }}>Bulanan</option>
            <option value="yearly" {{ request('filter') == 'yearly' ? 'selected' : '' }}>Tahunan</option>
        </select>
    </form>

    <!-- Card untuk tabel laporan penjualan -->
    <div class="card mb-4">
        <div class="card-header">Daftar Laporan Penjualan</div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>ID Penjualan</th>
                        <th>Kasir</th>
                        <th>Total Harga</th>
                        <th>Dibuat Pada</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($sales as $sale)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $sale->id }}</td>
                            <td>{{ $sale->user->name }}</td>
                            <td>{{ number_format($sale->total_harga, 0, ',', '.') }}</td>
                            <td>{{ $sale->created_at->format('d-m-Y') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Grafik Penjualan Tahunan -->
    <div class="card mb-4">
        <div class="card-header">Grafik Penjualan Tahunan (Januari - Desember)</div>
        <div class="card-body">
            <canvas id="yearlySalesChart"></canvas>
        </div>
    </div>

</div>

<!-- Import Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    // Grafik Penjualan Tahunan
    console.log('Monthly Sales:', @json($monthlySales));

    var ctx = document.getElementById('yearlySalesChart').getContext('2d');
    // console.log($monthlySales);
    var yearlySalesChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: @json($labels),  // Nama-nama bulan (Jan, Feb, ..., Dec)
            datasets: [{
                label: 'Total Penjualan (IDR)',
                data: @json($monthlySales), // Total penjualan per bulan
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

@endsection
