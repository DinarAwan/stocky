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
        return $this->model->all();
    }

    public function getStokById($id)
    {
        return $this->model->find($id);
    }

    public function createStok(array $stokDetails){
        return $this->model->create($stokDetails);
    }
}
