<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion " id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/Admin">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Quick POS<sup>'</sup></div>
    </a>
    @if (Auth::user()->role == 1)
        
    
    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    
    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="/admin/">
        <i class="fa-solid fa-home"></i>
            <span>Dashboard Admin</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="false">
            <i class="fa-solid fa-circle-check"></i>
            <span>Kelola Produk</span>
        </a>
        <div class="collapse show" id="home-collapse">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Kelola Produk:</h6>
                <a class="collapse-item" href="/admin/kategori">Kategori Produk</a>
                <a class="collapse-item" href="/admin/produk" >Semua Produk</a>
                <a class="collapse-item" href="/admin/addProduk">Tambah Produk</a>
                {{-- <a class="collapse-item" href="/admin/diskon">Diskon Produk</a> --}}
                {{-- <a class="collapse-item" href="utilities-other.html">Other</a> --}}
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/admin/kasir" >
        <i class="fa-solid fa-user-plus"></i>
            <span>Kelola Kasir</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/admin/laporan">
        <i class="fa fa-money"></i>
            <span>Laporan Penjualan</span>
        </a>
    </li>
    <li class="nav-item">
        <form action="/logout" method="post">
            @csrf
          <button type="submit" class="btn btn-link nav-link">
            <i class="fas fa-sign-out-alt"></i>
            Log Out</button>
        </form>
    </li>



    @else
    <hr class="sidebar-divider my-0">
    <li class="nav-item">
        <a class="nav-link" href="/kasir">
        <i class="fa-solid fa-home"></i>
            <span>Dashboard Kasir</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/penjualan">
        <i class="fa fa-shopping-cart"></i>
            <span>Penjualan</span>
        </a>
    </li>
    <li class="nav-item">
        <form action="/logout" method="post">
            @csrf
          <button type="submit" class="btn btn-link nav-link">
            <i class="fas fa-sign-out-alt"></i>
            Log Out</button>
        </form>
    </li>
    @endif
</ul>