@extends("layouts.main")

@section("content")
<!-- Begin Page Content -->
<div class="container-fluid">
  <div id="content">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard Admin</h1>
    </div>

    <div class="row justify-content-center">
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <h1 class="h5 font-weight-bold text-warning text-uppercase mb-1">
                                Total Penjualan Hari ini </h1>
                            <p class="h4 mb-0 font-weight-bold text-gray-800">0</p>
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
                            <div class="h4 mb-0 font-weight-bold text-gray-800">0</div>
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
                            <div class="h4 mb-0 font-weight-bold text-gray-800">0</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-primary"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Pencatatan Transaksi</h1>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Pencatatan Transaksi Toko</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Transaksi ID</th>
                                            <th>Kasir</th>
                                            <th>Total Harga</th>
                                            <th>Time Stamps</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1329133</td>
                                            <td>Vony</td>
                                            <td>Rp. 77.000</td>
                                            <td>07-01-2024 10:20</td>
                                        </tr>    
                                        <tr>
                                            <td>1329133</td>
                                            <td>Vony</td>
                                            <td>Rp. 77.000</td>
                                            <td>07-01-2024 10:20</td>
                                        </tr>    
                                        <tr>
                                            <td>1329133</td>
                                            <td>Vony</td>
                                            <td>Rp. 77.000</td>
                                            <td>07-01-2024 10:20</td>
                                        </tr>    
                                        <tr>
                                            <td>1329133</td>
                                            <td>Vony</td>
                                            <td>Rp. 77.000</td>
                                            <td>07-01-2024 10:20</td>
                                        </tr>    
                                        <tr>
                                            <td>1329133</td>
                                            <td>Vony</td>
                                            <td>Rp. 77.000</td>
                                            <td>07-01-2024 10:20</td>
                                        </tr>    
                                        <tr>
                                            <td>1329133</td>
                                            <td>Vony</td>
                                            <td>Rp. 77.000</td>
                                            <td>07-01-2024 10:20</td>
                                        </tr>    
                                        <tr>
                                            <td>1329133</td>
                                            <td>Vony</td>
                                            <td>Rp. 77.000</td>
                                            <td>07-01-2024 10:20</td>
                                        </tr>    
                                        <tr>
                                            <td>1329133</td>
                                            <td>Vony</td>
                                            <td>Rp. 77.000</td>
                                            <td>07-01-2024 10:20</td>
                                        </tr>    
                                        <tr>
                                            <td>1329133</td>
                                            <td>Vony</td>
                                            <td>Rp. 77.000</td>
                                            <td>07-01-2024 10:20</td>
                                        </tr>    
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<a class="scroll-to-top rounded" href="#page-top">
<i class="fas fa-angle-up"></i>
</a>    
@endsection
