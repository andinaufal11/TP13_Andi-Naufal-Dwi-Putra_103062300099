@extends('layouts.app')

@section('title', 'Dashboard Utama')

@section('content')
<div class="row align-items-center mb-5">
    <div class="col-md-8">
        <h2 class="fw-bold mb-1">Selamat Datang, {{ Auth::user()->name ?? 'Nau' }}! 👋</h2>
        <p class="text-muted">Inilah ringkasan aktivitas toko kamu hari ini.</p>
    </div>
    <div class="col-md-4 text-end">
        <a href="{{ route('products.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-lg me-2"></i>Tambah Produk
        </a>
    </div>
</div>

<div class="row g-4 mb-5">
    
    <div class="col-md-6">
        <div class="card p-4 border-0 h-100 bg-primary text-white" style="background: linear-gradient(135deg, #4318FF 0%, #7B4DFF 100%);">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <p class="mb-1 opacity-75">Total Produk</p>
                    <h2 class="fw-bold">{{ $totalProducts }} Item</h2>
                </div>
                <div class="bg-white bg-opacity-25 p-2 rounded-3">
                    <i class="bi bi-box-seam fs-4 text-white"></i>
                </div>
            </div>
            <a href="{{ route('products.index') }}" class="btn btn-light text-primary mt-4 fw-bold w-100">
                Lihat Semua Produk
            </a>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card p-4 h-100">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <p class="text-muted mb-1 small text-uppercase fw-bold">User Login</p>
                    <h3 class="fw-bold text-dark">Admin</h3>
                    <p class="text-muted small mt-2 mb-0">
                        {{ Auth::user()->email ?? 'user@example.com' }}
                    </p>
                </div>
                <div class="bg-warning bg-opacity-10 p-2 rounded-3">
                    <i class="bi bi-shield-lock fs-4 text-warning"></i>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection