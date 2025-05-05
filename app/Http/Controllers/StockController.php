<?php

namespace App\Http\Controllers;

use App\Models\StockTransaction;
use App\Services\StockTransaction\StockTransactionServiceImplement;
use Illuminate\Http\Request;

class StockController extends Controller
{
    // public function index(){
    //     $stok = StockTransaction::all();
    //     return view('stokTransaksi.index')->with('stok', $stok);
    // }
    protected $stockService;

    public function __construct(StockTransactionServiceImplement $stokServive){
        $this->stockService = $stokServive;
    }
   
    public function index(){
        $stok = $this->stockService->getAllStok();
        return view('stokTransaksi.index')->with('stok', $stok);
    }

    public function create(){
        $stok = $this->stockService->getAllStok();
        return view('stokTransaksi.create')->with('stok', $stok);
    }

    public function store(Request $request){
        $request->validate([
            'type' => 'required',
            'quantity' => 'required', 
            'date' =>'date',
            'status' => 'required|in:pending,diterima,ditolak,dikeluarkan',
        ]);

        $stok = $this->stockService->createStok($request->all());
        return redirect('stokTransaksi.index')->with('stok', $stok);
    }

}
