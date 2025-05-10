<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Services\Product\ProductServiceImplement;

class ProductManagerDashboard extends Controller
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
        return view('manager.produk')->with('data', $barang);
    }

    public function show($id)
    {
        $barang = $this->barangService->getBarangById($id);
        return view('products.show', compact('barang'));
    }
}
