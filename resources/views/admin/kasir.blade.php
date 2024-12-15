@extends('layouts.main')

@section('content')
<div class="container">
    <h1 class="my-4">Kelola Kasir</h1>

    <!-- Alert sukses -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Tabel Daftar Akun Kasir -->
    <div class="card mb-4">
        <div class="card-header">Daftar Akun Kasir</div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Dibuat Pada</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($kasirAccounts as $kasir)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $kasir->name }}</td>
                            <td>{{ $kasir->email }}</td>
                            <td>{{ $kasir->created_at->format('d-m-Y H:i') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">Tidak ada akun kasir</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Form Tambah Akun Kasir -->
    <div class="card">
        <div class="card-header">Tambah Akun Kasir Baru</div>
        <div class="card-body">
            <form action="{{ route('admin.kasir.store') }}" method="POST">
                @csrf
                <div class="form-group mb-3">
                    <label for="name">Nama</label>
                    <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror">
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="password_confirmation">Konfirmasi Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Tambah Akun</button>
            </form>
        </div>
    </div>
</div>
@endsection
