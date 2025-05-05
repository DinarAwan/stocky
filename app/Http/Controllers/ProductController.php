<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Services\Product\ProductServiceImplement;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $barangService;
    public function __construct(ProductServiceImplement $barangService)
    {
        $this->barangService = $barangService;
    }
    // public function create(){
    //     return view('products/create');
    // }


    public function index()
    {
        $barang = $this->barangService->getAllBarang();
        return view('products.index')->with('data', $barang);
    }


    
    public function create()
    {
        $barang = $this->barangService->getAllBarang();
        return view('products.create')->with('data', $barang);
    }

    public function store(Request $request)
    {
        $request->validate([
            'namaBarang' => 'required',
            'deskripsi' => 'required',
            'kategori_id' => 'required',
            'supplier_id' => 'required',
            'stock' => 'required'
        ]);
        
        $this->barangService->createBarang($request->all());
        
        return redirect()->route('produk.index')
            ->with('success', 'Barang berhasil ditambahkan.');
    }

    public function show($id)
    {
        $barang = $this->barangService->getBarangById($id);
        return view('products.show', compact('barang'));
    }

    public function edit($id)
    {
        $barang = $this->barangService->getBarangById($id);
        // return view('products.edit', compact('barang'));
        return view('products.edit')->with('barang', $barang);
    }   

    public function update(Request $request, $id)
    {
        $request->validate([
            'namaBarang' => 'required',
            'deskripsi' => 'required',
            'kategori_id' => 'required',
            'supplier_id' => 'required',
            'stock' => 'required'
        ]);
        
        $this->barangService->updateBarang($id, $request->all());
        
        return redirect()->route('produk.index')
            ->with('success', 'Barang berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $this->barangService->deleteBarang($id);
        
        return redirect()->route('produk.index')
            ->with('success', 'Barang berhasil dihapus.');
    }
}
