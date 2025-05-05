<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Services\Supplier\SupplierServiceImplement;

class SupplierController extends Controller
{
    protected $supplierService;
    public function __construct(SupplierServiceImplement $supplierService)
    {
        $this->supplierService = $supplierService;
    }

    public function index()
    {
        $supplier = $this->supplierService->getAllSupplier();
        return view('supplier.index')->with('supplier', $supplier);
    }

    public function create(){
        return view('supplier.create');
    }

    public function store(Request $request){
        $request->validate([
            'nama'=>'required',
            'nomor_hp'=>'required',
            'email' => 'required',
            'alamat' => 'required'
        ]);

        $this->supplierService->createSupplier($request->all());
        return redirect('supplier')->with('success', 'Barang berhasil ditambahkan.');
    }

    public function edit($id){
        $supplier = $this->supplierService->getSupplierById($id);
        return view('supplier.edit')->with('supplier', $supplier);
    }

    public function update(Request $request, $id){
        $request->validate([
            'nama'=>'required',
            'nomor_hp'=>'required',
            'email' => 'required',
            'alamat' => 'required'
        ]);

        $this->supplierService->updateSupplier($id, $request->all());
        return redirect()->route('supplier.index')
        ->with('success', 'Barang berhasil diperbarui.');
    }

    public function destroy($id){
        $this->supplierService->deleteSupplier($id);
        return redirect()->route('supplier.index')->with('success', 'Barang berhasil dihapus.');
    }

    public function supplierForManager(){
        $supplier = $this->supplierService->getAllSupplier();
        return view('manager.supplier')->with('supplier', $supplier);
    }
}
