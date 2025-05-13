<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Services\Product\ProductServiceImplement;

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


    public function index(Request $request)
    {
        if($request->has('search')){
            $barang = Product::where('namaBarang', 'like', '%'. $request->search. '%')->get();
        }else{
            $barang = $this->barangService->getAllBarang();
        }
        
        return view('products.index')->with('data', $barang);
    }
    //-
    public function indexForStok()
    {
        $barang = $this->barangService->getAllBarang();
        return view('stokTransaksi.create')->with('barang', $barang);
    }
    //-
    public function create()
    {
        $barang = $this->barangService->getAllBarang();
        return view('products.create')->with('data', $barang);
    }

   


    public function store(Request $request)
{
    $validated = $request->validate([
        'namaBarang' => 'required|string|max:255',
        'deskripsi' => 'required|string',
        'kategori_id' => 'required|exists:kategori,id',
        'supplier_id' => 'required|exists:suppliers,id',
        'stock' => 'required|integer|min:0',
        'harga_beli' => 'required|numeric|min:0',
        'harga_jual' => 'required|numeric|min:0',
        'foto' => 'nullable|image|mimes:jpeg,jpg,png,gif|max:2048'
    ]);

    $foto_nama = null;

    if ($request->hasFile('foto')) {
        $foto_file = $request->file('foto');
        $foto_nama = now()->format('YmdHis') . '.' . $foto_file->getClientOriginalExtension();
        $foto_file->move(public_path('foto'), $foto_nama);
    }

    $validated['foto'] = $foto_nama;

    $this->barangService->createBarang($validated);

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
            'stock' => 'required',
            'harga_beli' => 'required',
            'harga_jual' => 'required',
        ]);
        
        $this->barangService->updateBarang($id, $request->all());
        
        return redirect()->route('produk.index')
            ->with('success', 'Barang berhasil diperbarui.');
    }

    public function destroy($id)
    {

        $data = Product::where('id', $id)->first();
        File::delete(public_path('foto'). '/'. $data->foto);
        Product::where('id', $id)->delete();
        return redirect()->route('produk.index')
        ->with('success', 'Barang berhasil dihapus.');

        // $this->barangService->deleteBarang($id);
        
    }

   
}
