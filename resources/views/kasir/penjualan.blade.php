@extends('layouts.main')

@section('content')
<div class="container">
    <h1 class="my-4">Form Penjualan</h1>

    <!-- Alert sukses -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
            @if(session('pdf_url'))
                <script>
                    window.onload = function () {
                        const pdfUrl = "{{ session('pdf_url') }}";
                        window.open(pdfUrl, '_blank'); // Membuka PDF di tab baru
                    };
                </script>
            @endif
        </div>
    @endif
    @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif

    <div class="row">
        @foreach ($produks as $produk)
        <div class="col-md-4">
            <div class="card mb-4">
                {{-- <img src="{{ $produk->image_url }}" class="card-img-top" alt="{{ $produk->nama_produk }}"> --}}
                <div class="card-body">
                    <h5 class="card-title" id="produk_name{{ $produk->id }}">{{ $produk->nama_produk }}</h5>
                    {{-- <p class="card-text">{{ $produk->desc_produk }}</p> --}}
                    <p class="card-text" id="produk_price{{ $produk->id }}">Harga: Rp {{ number_format($produk->harga_setelah_diskon, 0, ',', '.') }}</p>

                    <!-- Input Quantity -->
                    <div class="form-group">
                        <label for="quantity{{ $produk->id }}">Quantity</label>
                        <input type="number" id="quantity{{ $produk->id }}" class="form-control" value="1" min="1">
                    </div>

                    <!-- Button to Add to Cart -->
                    <button class="btn btn-primary mt-2" onclick="addToCart({{ $produk->id }})">
                        Tambah ke Cart
                    </button>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Tabel Produk yang Ditambahkan -->
    <h3 class="my-4">Produk yang Ditambahkan</h3>
    <form action="/penjualan" method="POST">
        @csrf
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Subtotal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody id="cartTableBody">
                <!-- Dinamis melalui JavaScript -->
            </tbody>
        </table>
        <input type="hidden" name="produk_id" id="produk_id">
        <input type="hidden" name="quantity" id="quantity">
        <input type="hidden" name="user_id" id="user_id" value="{{ Auth::user()->id }}">

        <div class="d-flex justify-content-center">
            <h4 id="cart-total">Total: Rp 0</h4>
        </div>
    
        <button type="submit" class="btn btn-success">Simpan Penjualan</button>
    </form>
</div>

<script>
    // Fungsi untuk menambah produk ke cart
    function addToCart(produkId) {
        const quantity = document.getElementById('quantity' + produkId).value;
        const produkName = document.getElementById('produk_name' + produkId).textContent;
        const produkPrice = parseFloat(document.getElementById('produk_price' + produkId).textContent.replace('Harga: Rp ', '').replace(/\./g, '').trim());

        const cart = JSON.parse(localStorage.getItem('cart')) || [];

        // Cek apakah produk sudah ada di cart
        let found = false;
        cart.forEach(item => {
            if (item.id === produkId) {
                item.quantity += parseInt(quantity);
                found = true;
            }
        });

        if (!found) {
            cart.push({
                id: produkId,
                name: produkName,
                price: produkPrice,
                quantity: parseInt(quantity)
            });
        }

        // Simpan kembali cart ke localStorage
        localStorage.setItem('cart', JSON.stringify(cart));

        // Log untuk debugging
        console.log("Cart setelah ditambahkan: ", cart);

        alert(produkName + " berhasil ditambahkan ke cart!");
        displayCart(); // Update tampilan cart
    }

    // Fungsi untuk menampilkan cart di tabel
    function displayCart() {
        const cart = JSON.parse(localStorage.getItem('cart')) || [];
        const cartTableBody = document.getElementById('cartTableBody');
        cartTableBody.innerHTML = ''; // Kosongkan tabel cart sebelumnya

        let total = 0;
        const produkIds = [];
        const quantities = [];

        cart.forEach((item, index) => {
            const subtotal = item.price * item.quantity;
            total += subtotal;

            produkIds.push(item.id);
            quantities.push(item.quantity);

            const row = `
                <tr>
                    <td>${item.name}</td>
                    <td>Rp ${item.price.toLocaleString()}</td>
                    <td>${item.quantity}</td>
                    <td>Rp ${subtotal.toLocaleString()}</td>
                    <td><button class="btn btn-danger" onclick="removeFromCart(${index})">Hapus</button></td>
                </tr>
            `;
            cartTableBody.innerHTML += row;
        });

        // Update hidden inputs
        document.getElementById('produk_id').value = JSON.stringify(produkIds);
        document.getElementById('quantity').value = JSON.stringify(quantities);

        // Update total
        document.getElementById('cart-total').textContent = 'Total: Rp ' + total.toLocaleString();
    }



    // Fungsi untuk update quantity produk dalam cart
    function updateQuantity(index, newQuantity) {
        const cart = JSON.parse(localStorage.getItem('cart')) || [];
        if (newQuantity < 1) return; // Cegah quantity kurang dari 1

        cart[index].quantity = newQuantity;
        localStorage.setItem('cart', JSON.stringify(cart));

        displayCart(); // Update tampilan cart
    }


    // Fungsi untuk menghapus produk dari cart
    function removeFromCart(index) {
        const cart = JSON.parse(localStorage.getItem('cart')) || [];
        cart.splice(index, 1);
        localStorage.setItem('cart', JSON.stringify(cart));

        // Update tampilan cart setelah menghapus produk
        displayCart();
    }

    // Panggil displayCart saat halaman dimuat
    // document.querySelector('form').addEventListener('submit', function() {
    // // Menghapus cart dari localStorage
    // localStorage.removeItem('cart');
    // });
    // document.addEventListener('DOMContentLoaded', function() {
    // displayCart(); // Menampilkan cart setelah halaman selesai dimuat
    // });

    // window.onload = function() {
    //     localStorage.removeItem('cart');
    //     console.log("Cart telah dihapus dari localStorage saat halaman dimuat");
    // };

    // Menghapus cart setelah submit form
    document.addEventListener('DOMContentLoaded', function() {
        console.log("DOM Loaded");
        const form = document.querySelector('form');

        if (form) {
            console.log("Form ditemukan");
            form.addEventListener('submit', function(event) {
                console.log("Submit terdeteksi");
                localStorage.removeItem('cart');
                console.log("Cart telah dihapus setelah submit");
            });
        } else {
            console.log("Form tidak ditemukan");
        }
    });
    document.addEventListener('DOMContentLoaded', function () {
        localStorage.removeItem('cart');
        console.log("Cart telah dihapus saat halaman dimuat");
    });

    // document.addEventListener('DOMContentLoaded', displayCart);
</script>
@endsection
