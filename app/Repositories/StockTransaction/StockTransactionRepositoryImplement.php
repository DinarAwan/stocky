<?php

namespace App\Repositories\StockTransaction;

use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\StockTransaction;

class StockTransactionRepositoryImplement extends Eloquent implements StockTransactionRepository{

    /**
    * Model class to be used in this repository for the common methods inside Eloquent
    * Don't remove or change $this->model variable name
    * @property Model|mixed $model;
    */
    protected $model;

    public function __construct(StockTransaction $model)
    {
        $this->model = $model;
    }

    public function getAllStock(){
        return $this->model->with(['product', 'users'])->get();
    }

    public function getStokById($id)
    {
        return $this->model->with(['product', 'users'])->find($id);
    }

    public function createStok(array $stokDetails){
        return $this->model->create($stokDetails);
    }

    public function updateStok($id, array $newDetails){
        if (isset($newDetails['_token'])) {
            unset($newDetails['_token']);
        }
        if (isset($newDetails['_method'])) {
            unset($newDetails['_method']);
        }
        return $this->model->whereId($id)->update($newDetails);
    }

    public function deleteStok($id)
    {
        $this->model->findOrFail($id);
        return $this->model->destroy($id);
    }

    // public function getAllWithStock()
    // {
    //     return StockTransaction::with('product')
    //         ->get()
    //         ->map(function ($stock_transaction) {
    //             $stockIn = $stock_transaction->product_id->where('type', 'masuk')->sum('quantity');
    //             $stockOut = $stock_transaction->product_id->where('type', 'keluar')->sum('quantity');
    //             $stock_transaction->stock = $stockIn - $stockOut;
    //             return $stock_transaction;
    //         });
    // }

    public function getStockByType($type)
{
    $query = $this->model->query();

    if ($type) {
        $query->whereHas('stock_transaction', function ($q) use ($type) {
            $q->where('type', $type)->count(); 
        });
    }

    return $query->with(['products', 'users']);
}


    public function getTransByStatus(){
        return $this->model->where('status', 'pending')->with(['product', 'users'])->get();
    }



}
