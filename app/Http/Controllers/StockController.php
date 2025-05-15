<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StockTransaction;
use App\Services\User\UserService;
use App\Services\Product\ProductServiceImplement;
use App\Services\StockTransaction\StockTransactionServiceImplement;

class StockController extends Controller
{
    // public function index(){
    //     $stok = StockTransaction::all();
    //     return view('stokTransaksi.index')->with('stok', $stok);
    // }
    protected $stockService;
    private $userService;
    protected $barangService;

    public function __construct(StockTransactionServiceImplement $stokServive, UserService $userService, ProductServiceImplement $barangService){
        [
            $this->stockService = $stokServive,
            $this->userService=$userService,
            $this->barangService = $barangService,
        ];
        
    }
   
    public function index(Request $request){
        if($request->has('search')){
            $stok = StockTransaction::where('type', 'like', '%'. $request->search. '%')->orderBy('date', 'desc')->get();
        }else{
            $stok = $this->stockService->getAllStok();
        }
        return view('stokTransaksi.index')->with('stok', $stok);
    }

    public function stokForAdmin(Request $request)
    {
        if($request->has('search')){
            $stok = StockTransaction::where('type', 'like', '%'. $request->search. '%')->orderBy('date', 'desc')->get();
        }else{
            $stok = $this->stockService->getAllStok();
        }
        return view('admin.stok')->with('stok', $stok);
    }

    public function stokForManager()
    {//barang masuk
        $masuk = StockTransaction::where('type', 'masuk')->count();
        $keluar = StockTransaction::where('type', 'keluar')->count();
        return view('dashboard.manager', ['masuk' => $masuk, 'keluar' => $keluar]);
    }

    public function stokForAdminDash()
    {//barang masuk
        $masuk = StockTransaction::where('type', 'masuk')->count();
        $keluar = StockTransaction::where('type', 'keluar')->count();
        return view('dashboard.admin', ['masuk' => $masuk, 'keluar' => $keluar]);
    }

    public function perluDiPeriksaStaf(){
        $masuk = StockTransaction::where('type', 'masuk')->where('status', 'pending')->count();
        $keluar = StockTransaction::where('type', 'keluar')->where('status', 'pending')->count();

        return view('dashboard.staf', ['masuk' => $masuk, 'keluar' => $keluar]);
    }

    public function create(){
        $stok = $this->stockService->getAllStok();
        $user = $this->userService->getAllUsers();
        $barang = $this->barangService->getAllBarang();
        return view('stokTransaksi.create', ['stok' => $stok, 'user' => $user, 'barang' => $barang]);
    }

    public function store(Request $request){
        $request->validate([
            'type' => 'required',
            'quantity' => 'required', 
            'date' =>'required',
            'status' => 'required|in:pending,diterima,ditolak,dikeluarkan',
        ]);

        $stok = $this->stockService->createStok($request->all());
        return redirect('stok')->with('stok', $stok);
    }

    public function edit($id){
        $stok = $this->stockService->getStokById($id);
        $user = $this->userService->getAllUsers();
        $barang = $this->barangService->getAllBarang();
        return view('stokTransaksi/edit',  ['stok' => $stok, 'user' => $user, 'barang' => $barang]);
    }

    public function update(Request $request, $id){

        $request->validate([
            'type' => 'required|in:masuk,keluar',
            'quantity' => 'required',
            'date' => 'required',
            'status' => 'required|in:pending,diterima,ditolak,dikeluarkan',
            'deskripsi' => ''
        ]);

        $this->stockService->updateStok($id, $request->all());
        
        return redirect()->route('stok')
            ->with('success', 'Barang berhasil diperbarui.');
    }

    public function destroy($id){
        $this->stockService->deleteStok($id);
        return redirect()->route('stok')->with('success', 'stok berhasil di delete');
    }

    public function getStockByType(Request $request)
{
    $type = $request->query('type'); // ambil dari query string ?type=makanan
    $data = $this->stockService->getStockByType($type);

    return view('dashboard.admin', compact('data', 'type')); // kirim juga 'type' untuk kebutuhan form
}


    public function getTransByStatus(){
        $stock = $this->stockService->getTransByStatus();
        return view('staf.perikasa')->with('stock', $stock);
    }

}
