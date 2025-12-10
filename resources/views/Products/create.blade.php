@extends('layouts.app')

@section('title', 'Tambah Produk')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-7">
        <div class="d-flex align-items-center mb-4">
            <a href="{{ route('products.index') }}" class="btn btn-light text-secondary rounded-circle me-3" style="width: 40px; height: 40px; display:flex; align-items:center; justify-content:center;">
                <i class="bi bi-arrow-left"></i>
            </a>
            <h4 class="fw-bold mb-0">Tambah Produk Baru</h4>
        </div>

        <div class="card p-4 p-md-5">
            <form action="{{ route('products.store') }}" method="POST">
                @csrf
                
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Nama Produk" required>
                    <label for="name">Nama Produk</label>
                </div>

                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control" id="price" name="price" placeholder="Harga" required>
                            <label for="price">Harga (Rp)</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control" id="stock" name="stock" placeholder="Stok" value="0" required>
                            <label for="stock">Stok Awal</label>
                        </div>
                    </div>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="toko" name="toko" placeholder="Nama Toko" required>
                    <label for="toko">Nama Toko</label>
                </div>

                <div class="form-floating mb-4">
                    <textarea class="form-control" placeholder="Deskripsi" id="description" name="description" style="height: 120px" required></textarea>
                    <label for="description">Deskripsi Produk</label>
                </div>

                <button type="submit" class="btn btn-primary w-100 py-3 fw-bold">
                    <i class="bi bi-save2-fill me-2"></i> Simpan Produk
                </button>
            </form>
        </div>
    </div>
</div>
@endsection