<?php

namespace App\Http\Controllers;

use App\Services\Kategori\KategoriServiceImplement;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    protected $categoryService;

    public function __construct(KategoriServiceImplement $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index(){
        $kategoris = $this->categoryService->getPaginatedCategories();
        return view('kategori/index')->with('kategoris', $kategoris);
    }

    public function create(){
        return view('kategori.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kategori' => 'required',
            
        ]);
        
        $this->categoryService->createKategori($request->all());
        
        return redirect()->route('kategori.index')
            ->with('success', 'Barang berhasil ditambahkan.');
    }

    public function show($id)
    {
        $barang = $this->categoryService->getCategoryById($id);
        return view('products.show', compact('barang'));
    }

    public function edit($id){
        $kategoris = $this->categoryService->getCategoryById($id);
        return view('kategori.edit', compact('kategoris'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kategori' => 'required',
            
        ]);
        
        $this->categoryService->updateKategori($id, $request->all());
        
        return redirect()->route('kategori.index')
            ->with('success', 'Barang berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $this->categoryService->deleteKategori($id);
        
        return redirect()->route('kategori.index')
            ->with('success', 'Barang berhasil dihapus.');
    }
  
}
