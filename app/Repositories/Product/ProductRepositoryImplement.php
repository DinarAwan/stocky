<?php

namespace App\Repositories\Product;

use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\Product;

class ProductRepositoryImplement extends Eloquent implements ProductRepository{

    /**
    * Model class to be used in this repository for the common methods inside Eloquent
    * Don't remove or change $this->model variable name
    * @property Model|mixed $model;
    */
    protected $model;

    public function __construct(Product $model)
    {
        $this->model = $model;
    }

    public function getAllBarang()
    {
        return $this->model->with(['kategori', 'supplier'])->get();;
    }

    public function getBarangById($id)
    {
        return $this->model->with(['kategori', 'supplier'])->find($id);
    }

    public function createBarang(array $barangDetails)
    {
        return $this->model->create($barangDetails);
    }

    public function updateBarang($id, array $newDetails)
    {
        // Hapus field _token dan _method jika ada
        if (isset($newDetails['_token'])) {
            unset($newDetails['_token']);
        }
        if (isset($newDetails['_method'])) {
            unset($newDetails['_method']);
        }
        
        return $this->model->whereId($id)->update($newDetails);
    }

    // public function updateBarang($id, array $newDetails)
    // {
    //     return $this->model->whereId($id)->update($newDetails);
    // }

    public function deleteBarang($id)
    {
        return $this->model->destroy($id);
    }
}
