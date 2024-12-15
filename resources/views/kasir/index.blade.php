@extends("layouts.main")

@section("content")
<!-- Begin Page Content -->
<div class="container-fluid">
  <div id="content">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard Kasir</h1>
    </div>

    <div class="row justify-content-center">
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <h1 class="h5 font-weight-bold text-warning text-uppercase mb-1">
                                Total Penjualan Hari ini </h1>
                            <p class="h4 mb-0 font-weight-bold text-gray-800">{{ $todaySale }}</p>
                        </div>
                        <div class="col-auto">
                            <i class="bi bi-archive-fill fa-2x text-warning"></i>
                        {{-- <i class="fa-solid fa-user-check fa-2xl text-success"></i> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <h1 class="h5 font-weight-bold text-success text-uppercase mb-1">
                                Total Transaksi</h1>
                            <div class="h4 mb-0 font-weight-bold text-gray-800">{{ number_format($todayMoneyAll, 2, ',', '.') }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-success"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h5 font-weight-bold text-primary text-uppercase mb-1">
                                Transaksi Hari ini</div>
                            <div class="h4 mb-0 font-weight-bold text-gray-800">{{ number_format($todayMoney, 2, ',', '.') }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-primary"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid d-flex justify-content-center align-items-center" style="height: 50vh; background-color: #007bff;">
        <div class="text-center text-white">
            <h1 class="display-3">Selamat datang, {{ Auth::user()->name }}</h1>
            <a href="/penjualan" class="btn btn-light btn-lg mt-4">Transaksi Penjualan</a>
        </div>
    </div>
</div>
</div>
<a class="scroll-to-top rounded" href="#page-top">
<i class="fas fa-angle-up"></i>
</a>    
@endsection
