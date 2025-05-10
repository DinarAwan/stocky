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
Route::get('dashboard', [DashAdminController::class, 'index']);
Route::get('dashboard/admin', [ProductController::class, 'HitungData']);
Route::get('dashboard', [StockController::class, 'stokForAdminDash']);



Route::get('dashboard/manager', [DashAdminController::class, 'managerIndex']);
Route::get('dashboard/staf', [DashAdminController::class, 'stafIndex']);  
Route::get('dashboard/staf', [StockController::class, 'perluDiPeriksaStaf']); 

//produk
Route::resource('produk', ProductController::class);

//kategori
Route::resource('kategori', KategoriController::class);

//suppliers
Route::resource('supplier',SupplierController::class);

//manager
Route::resource('produkManager', ProductManagerDashboard::class);
Route::get('supplierManager', [SupplierController::class, 'supplierForManager']);
Route::get('dashboard/manager', [StockController::class, 'stokForManager']);

//stocktransaction
Route::get('/stok', [StockController::class, 'index'])->name('stok');
Route::get('/stokAdmin', [StockController::class, 'stokForAdmin'])->name('stokAdmin');
Route::get('stok-create', [StockController::class, 'create']);
Route::post('stok-create', [StockController::class, 'store']);
Route::get('stok-edit/{id}', [StockController::class, 'edit']);
Route::post('stok-edit/{id}', [StockController::class, 'update']);
Route::delete('stok-delete/{id}', [StockController::class, 'destroy'])->name('stok.destroy');
Route::get('dashboard/{type}', [StockController::class, 'getStockByType']);
Route::get('periksa', [StockController::class, 'getTransByStatus']);

//login-reg
Route::get('sesi', [SesiController::class, 'index']);
Route::post('sesi', [SesiController::class, 'login']);
Route::get('/logout', [SesiController::class, 'logout']);
Route::get('sesi/register', [SesiController::class, 'reg']);
Route::post('sesi/register', [SesiController::class, 'register']);

//
Route::get('users', [UserController::class, 'index'])->name('users');
Route::delete('user-delete/{id}', [UserController::class, 'destroy'])->name('users.destroy');
Route::get('user-edit/{id}', [UserController::class, 'edit']);
Route::post('user-edit/{id}', [UserController::class, 'update']);

 