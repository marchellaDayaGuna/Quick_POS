@extends("layouts.main")

@section("content")
<div class="card shadow mb-4 mx-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary text-lg">Tambah Produk</h6>
    </div>
    <div class="card-body border-left-primary">
        <form action="/admin/produk" method="post">
            @csrf
            <div class="form-group pt-4">
                <input type="text" class="form-control mb-2 @error('nama_produk') is-invalid @enderror" id="nama_produk" name="nama_produk" placeholder="Nama Produk" required>
                @error('nama_produk')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
        
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="kategori_produk">Kategori</label>
                    </div>
                    <select class="custom-select @error('kategori_id') is-invalid @enderror" id="kategori_id" name="kategori_id" required>
                        <option selected disabled>Pilih Kategori</option>
                        @foreach ($kategoris as $kategori)
                        <option value="{{ $kategori->id }}">{{ $kategori->name }}</option>
                        @endforeach
                    </select>
                    @error('kategori_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
        
                <input type="number" class="form-control mb-2 @error('harga_produk') is-invalid @enderror" id="harga_produk" name="harga_produk" placeholder="Harga Produk" required>
                @error('harga_produk')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
        
                <input type="text" class="form-control mb-2 @error('stok_barang') is-invalid @enderror" id="stok_barang" name="stok_barang" placeholder="Stock Produk" required>
                @error('stok_barang')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                <input type="number" class="form-control mb-2 @error('diskon') is-invalid @enderror" id="diskon" name="diskon" placeholder="Diskon" required>
                @error('diskon')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
        
                <button type="submit" class="btn btn-success btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-plus"></i>
                    </span>
                    <span class="text">Tambah Produk</span>
                </button> 
            </div>
        </form>
        
    </div>
</div>
@endsection