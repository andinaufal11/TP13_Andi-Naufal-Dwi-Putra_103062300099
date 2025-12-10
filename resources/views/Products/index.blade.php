@extends('layouts.app')

@section('title', 'Daftar Produk')

@section('content')
<div class="card p-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="fw-bold mb-0">Daftar Produk</h4>
            <small class="text-muted">Kelola inventaris toko kamu</small>
        </div>
        <a href="{{ route('products.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle me-2"></i>Baru
        </a>
    </div>

    <div class="table-responsive">
        <table class="table table-hover align-middle" style="border-collapse: separate; border-spacing: 0 10px;">
            <thead class="bg-light">
                <tr class="text-secondary small text-uppercase">
                    <th class="border-0 rounded-start ps-4">Info Produk</th>
                    <th class="border-0">Harga</th>
                    <th class="border-0">Stok</th>
                    <th class="border-0">Toko</th>
                    <th class="border-0 rounded-end text-end pe-4">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($products as $p)
                <tr class="bg-white shadow-sm" style="transition: 0.2s;">
                    <td class="border-0 ps-4 py-3 rounded-start">
                        <div class="d-flex align-items-center">
                            <div class="bg-primary bg-opacity-10 text-primary rounded-3 d-flex align-items-center justify-content-center me-3" style="width: 45px; height: 45px;">
                                <i class="bi bi-bag-fill fs-5"></i>
                            </div>
                            <div>
                                <h6 class="mb-0 fw-bold text-dark">{{ $p->name }}</h6>
                                <small class="text-muted text-truncate" style="max-width: 150px; display:block;">
                                    {{ $p->description }}
                                </small>
                            </div>
                        </div>
                    </td>
                    <td class="border-0 fw-bold text-dark">
                        Rp {{ number_format($p->price, 0, ',', '.') }}
                    </td>
                    <td class="border-0">
                        @if($p->stock > 10)
                            <span class="badge bg-success bg-opacity-10 text-success px-3 py-2 rounded-pill">
                                Ready ({{ $p->stock }})
                            </span>
                        @elseif($p->stock > 0)
                            <span class="badge bg-warning bg-opacity-10 text-warning px-3 py-2 rounded-pill">
                                Menipis ({{ $p->stock }})
                            </span>
                        @else
                            <span class="badge bg-danger bg-opacity-10 text-danger px-3 py-2 rounded-pill">
                                Habis
                            </span>
                        @endif
                    </td>
                    <td class="border-0 text-secondary">
                        <i class="bi bi-shop me-1"></i> {{ $p->toko }}
                    </td>
                    <td class="border-0 text-end pe-4 rounded-end">
                        <a href="{{ route('products.edit', $p->id) }}" class="btn btn-light text-primary btn-sm me-1 rounded-3">
                            <i class="bi bi-pencil-fill"></i>
                        </a>
                        <form action="{{ route('products.destroy', $p->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-light text-danger btn-sm rounded-3" onclick="return confirm('Yakin hapus?')">
                                <i class="bi bi-trash-fill"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center py-5">
                        <div class="text-muted">
                            <i class="bi bi-box fs-1 mb-3 d-block opacity-25"></i>
                            Belum ada produk. Yuk tambah sekarang!
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection