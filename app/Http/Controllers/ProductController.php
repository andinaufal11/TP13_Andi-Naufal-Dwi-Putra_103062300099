<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function dashboard()
    {
        // 1. Hitung Total Produk
        $totalProducts = Product::count();

        // 2. Hitung Stok Menipis (kurang dari 5)
        $lowStock = Product::where('stock', '<', 5)->count();

        // 3. (BARU) Hitung Jumlah Toko Unik untuk ditampilkan di Dashboard
        $totalToko = Product::distinct('toko')->count('toko');

        // Kirim ketiga variabel ke view
        return view('dashboard', compact('totalProducts', 'lowStock', 'totalToko'));
    }

    public function index()
    {
        $products = Product::latest()->get();
        return view('Products.index', compact('products'));
    }

    public function create()
    {
        return view('Products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'toko' => 'required',
            'description' => 'required'
        ]);

        Product::create($request->all());

        return redirect()->route('products.index')
                         ->with('success', 'Produk berhasil ditambahkan!');
    }

    public function edit(Product $product)
    {
        return view('Products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'toko' => 'required',
            'description' => 'required'
        ]);

        $product->update($request->all());

        return redirect()->route('Products.index')
                         ->with('success', 'Produk berhasil diperbarui!');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('Products.index')
                         ->with('success', 'Produk berhasil dihapus!');
    }
}
