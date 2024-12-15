@extends("layouts.main")

@section("content")
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Produk</h1>

    <!-- Alert Sukses -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Alert Error -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="/admin/addProduk" class="btn btn-primary btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fas fa-arrow-right"></i>
                </span>
                <span class="text">Tambah Produk</span>
            </a>
        </div>
        {{-- Tabel --}}
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Kategori</th>
                            <th>Harga</th>
                            <th>Stok Barang</th>
                            <th>Diskon</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $increment = 1; @endphp <!-- Penambahan variabel penomoran -->
                        @foreach ($produks as $produk)
                        <tr>
                            <td>{{ $increment++ }}</td>
                            <td>{{ $produk->nama_produk }}</td>
                            <td>{{ $produk->kategori->name }}</td> <!-- Asumsi relasi kategori -->
                            <td>{{ number_format($produk->harga_setelah_diskon, 2, ',', '.') }}</td> <!-- Format harga -->
                            <td>{{ $produk->stok_barang }}</td>
                            <td>
                                <form action="/admin/produk/{{ $produk->id }}/diskon" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <div class="input-group">
                                        <input 
                                            type="number" 
                                            class="form-control @error('diskon') is-invalid @enderror" 
                                            name="diskon" 
                                            placeholder="Diskon (%)" 
                                            value="{{ old('diskon', $produk->diskon) }}" 
                                            min="0" 
                                            max="100" 
                                            required>
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-success btn-sm">Set</button>
                                        </div>
                                        @error('diskon')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </form>
                            </td>
                            <td>
                                <a href="/admin/produk/{{ $produk->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
                                <form action="/admin/produk/{{ $produk->id }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus produk ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>  
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
