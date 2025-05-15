<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\StockTransaction;
use App\Services\Product\ProductServiceImplement;
use PHPUnit\Framework\Attributes\WithoutErrorHandler;

class DashAdminController extends Controller
{
    protected $barangService;
    public function __construct(ProductServiceImplement $barangService)
    {
        $this->barangService = $barangService;
    }
    public function index(){
        $barang = $this->barangService->getAllBarang()->count();
        return view('dashboard.admin', [ 'barang' => $barang]);
    }

    public function managerIndex(){
        return view('dashboard.manager');
    }

    public function stafIndex(){
        return view('dashboard.staf');
    }
}
