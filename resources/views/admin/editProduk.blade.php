@extends("layouts.main")

@section("content")
<div class="card shadow mb-4 mx-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary text-lg">Edit Produk</h6>
    </div>
    <div class="card-body border-left-primary">
        <form action="/admin/produk/{{ $produk->id }}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group pt-4">
                <input 
                    type="text" 
                    class="form-control mb-2 @error('nama_produk') is-invalid @enderror" 
                    id="nama_produk" 
                    name="nama_produk" 
                    placeholder="Nama Produk" 
                    value="{{ old('nama_produk', $produk->nama_produk) }}" 
                    required>
                @error('nama_produk')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="kategori_produk">Kategori</label>
                    </div>
                    <select 
                        class="custom-select @error('kategori_id') is-invalid @enderror" 
                        id="kategori_id" 
                        name="kategori_id" 
                        required>
                        <option disabled>Pilih Kategori</option>
                        @foreach ($kategoris as $kategori)
                            <option value="{{ $kategori->id }}" 
                                {{ $kategori->id == old('kategori_id', $produk->kategori_id) ? 'selected' : '' }}>
                                {{ $kategori->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('kategori_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <input 
                    type="number" 
                    class="form-control mb-2 @error('harga_produk') is-invalid @enderror" 
                    id="harga_produk" 
                    name="harga_produk" 
                    placeholder="Harga Produk" 
                    value="{{ old('harga_produk', $produk->harga_produk) }}" 
                    required>
                @error('harga_produk')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

                <input 
                    type="text" 
                    class="form-control mb-2 @error('stok_barang') is-invalid @enderror" 
                    id="stok_barang" 
                    name="stok_barang" 
                    placeholder="Stock Produk" 
                    value="{{ old('stok_barang', $produk->stok_barang) }}" 
                    required>
                @error('stok_barang')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

                <input 
                    type="number" 
                    class="form-control mb-2 @error('diskon') is-invalid @enderror" 
                    id="diskon" 
                    name="diskon" 
                    placeholder="Diskon" 
                    value="{{ old('diskon', $produk->diskon) }}" 
                    required>
                @error('diskon')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

                <button type="submit" class="btn btn-primary btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-save"></i>
                    </span>
                    <span class="text">Simpan Perubahan</span>
                </button> 
            </div>
        </form>
    </div>
</div>
@endsection
