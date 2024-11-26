<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion " id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/Admin">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Quick POS<sup>'</sup></div>
    </a>

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
                <a class="collapse-item" href="/admin/produk" style="pointer-events: none;">Semua Produk</a>
                <a class="collapse-item" href="/admin/addProduk" style="pointer-events: none;">Tambah Produk</a>
                <a class="collapse-item" href="/admin/addProduk" style="pointer-events: none;">Diskon Produk</a>
                {{-- <a class="collapse-item" href="utilities-other.html">Other</a> --}}
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/admin/kasir" style="pointer-events: none;">
        <i class="fa-solid fa-user-plus"></i>
            <span>Kelola Kasir</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/admin/supplier" style="pointer-events: none;">
        <i class="fa fa-money"></i>
            <span>Laporan Penjualan</span>
        </a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    <li class="nav-item">
        <a class="nav-link" href="/">
        <i class="fa-solid fa-home"></i>
            <span>Dashboard Kasir</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/admin/supplier" style="pointer-events: none;">
        <i class="fa-solid fa-archive"></i>
            <span>Produk Toko</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/admin/supplier" style="pointer-events: none;">
        <i class="fa fa-money"></i>
            <span>Transaksi Hari ini</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/admin/supplier" style="pointer-events: none;">
        <i class="fa fa-shopping-cart"></i>
            <span>Penjualan</span>
        </a>
    </li>
</ul>