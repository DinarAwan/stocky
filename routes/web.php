<?php

use App\Http\Controllers\CobaController;
use App\Http\Controllers\DashAdminController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductManagerDashboard;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function(){
    return redirect('/sesi');
});

Route::name('index-practice')->get('/njay', function () {
    return view('example.content.crud.products');
});

// Route::name('index-practice')->get('/', function () {
//     return view('users.user');
// });


Route::name('practice.')->group(function () {
    Route::name('first')->get('practice/1', function () {
        return view('pages.practice.1');
    });
    Route::name('second')->get('practice/2', function () {
        return view('pages.practice.2');
    });
});

// Route::get('result', [CobaController::class, 'index']);


// Route::get('produk', [ProductController::class, 'index']);
// Route::get('produk/create', [ProductController::class, 'create']);

//dashboard
Route::get('dashboard', [ProductController::class, 'HitungData'])->middleware('userAkses:admin');
Route::get('dashboard', [StockController::class, 'stokForAdminDash'])->middleware('userAkses:admin');

Route::get('dashboard/manager', [DashAdminController::class, 'managerIndex'])->middleware('userAkses:manager_gudang');
Route::get('dashboard/staf', [DashAdminController::class, 'stafIndex'])->middleware('userAkses:staf_gudang');  
Route::get('dashboard/staf', [StockController::class, 'perluDiPeriksaStaf'])->middleware('userAkses:staf_gudang'); 

//produk
Route::resource('produk', ProductController::class);
//kategori
Route::resource('kategori', KategoriController::class)->middleware('userAkses:admin');
//suppliers
Route::resource('supplier',SupplierController::class)->middleware('userAkses:admin');
Route::get('users', [UserController::class, 'index'])->name('users')->middleware('userAkses:admin');
Route::delete('user-delete/{id}', [UserController::class, 'destroy'])->name('users.destroy')->middleware('userAkses:admin');
Route::get('user-edit/{id}', [UserController::class, 'edit'])->middleware('userAkses:admin');
Route::post('user-edit/{id}', [UserController::class, 'update'])->middleware('userAkses:admin');

//manager
Route::resource('produkManager', ProductManagerDashboard::class)->middleware('userAkses:manager_gudang');
Route::get('supplierManager', [SupplierController::class, 'supplierForManager'])->middleware('userAkses:manager_gudang');
Route::get('dashboard/manager', [StockController::class, 'stokForManager'])->middleware('userAkses:manager_gudang');

//stocktransaction
Route::get('/stok', [StockController::class, 'index'])->name('stok')->middleware('userAkses:manager_gudang');
Route::get('/stokAdmin', [StockController::class, 'stokForAdmin'])->name('stokAdmin')->middleware('userAkses:admin');
Route::get('stok-create', [StockController::class, 'create'])->middleware('userAkses:manager_gudang');
Route::post('stok-create', [StockController::class, 'store'])->middleware('userAkses:manager_gudang');
Route::get('stok-edit/{id}', [StockController::class, 'edit'])->middleware('userAkses:manager_gudang');
Route::post('stok-edit/{id}', [StockController::class, 'update'])->middleware('userAkses:manager_gudang');
Route::delete('stok-delete/{id}', [StockController::class, 'destroy'])->name('stok.destroy')->middleware('userAkses:manager_gudang');
Route::get('dashboard/{type}', [StockController::class, 'getStockByType'])->middleware('userAkses:manager_gudang');

Route::get('periksa', [StockController::class, 'getTransByStatus'])->middleware('userAkses:staf_gudang');

//login-reg
Route::middleware(['guest'])->group(function(){
    Route::get('sesi', [SesiController::class, 'index'])->name('login');
    Route::post('sesi', [SesiController::class, 'login']);
    Route::get('sesi/register', [SesiController::class, 'reg']);
    Route::post('sesi/register', [SesiController::class, 'register']); 
});
Route::get('/home', function(){
    return redirect('dashboard/staf');
});


Route::middleware(['auth'])->group(function(){
    Route::get('/logout', [SesiController::class, 'logout']);
});

//


 