<?php

namespace App\Repositories\Supplier;

use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\Supplier;

class SupplierRepositoryImplement extends Eloquent implements SupplierRepository{

    /**
    * Model class to be used in this repository for the common methods inside Eloquent
    * Don't remove or change $this->model variable name
    * @property Model|mixed $model;
    */
    protected $model;

    public function __construct(Supplier $model)
    {
        $this->model = $model;
    }

    
    public function getAllSupplier()
    {
        return $this->model->orderBy('id', 'asc')->get();
    }

    public function getSupplierById($id)
    {
        return $this->model->findOrFail($id);
    }

    public function createSupplier(array $supplierDetails){
        return $this->model->create($supplierDetails);
    }

    public function updateSupplier($id, array $newDetails){

        if (isset($newDetails['_token'])) {
            unset($newDetails['_token']);
        }
        if (isset($newDetails['_method'])) {
            unset($newDetails['_method']);
        }
        return $this->model->whereId($id)->update($newDetails);
    }

    public function deleteSupplier($id){
        $this->model->destroy($id);
    }
}
