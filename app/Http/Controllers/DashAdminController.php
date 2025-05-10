<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\StockTransaction;
use Illuminate\Http\Request;
use PHPUnit\Framework\Attributes\WithoutErrorHandler;

class DashAdminController extends Controller
{
    public function index(){
        return view('dashboard.admin');
    }
   
 
    public function HitungData(){
        $TotalProduk = Product::count();
        return view('dashboard/admin', ['hitungProduk' => $TotalProduk]);

    }
   

    

    public function managerIndex(){
        return view('dashboard.manager');
    }

    public function stafIndex(){
        return view('dashboard.staf');
    }
}
