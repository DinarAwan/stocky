<?php

namespace App\Services\Product;

use LaravelEasyRepository\BaseService;

interface ProductService extends BaseService{
    
    public function getAllBarang();
    public function getBarangById($id);
    public function createBarang(array $barangDetails);

    public function updateBarang($id, array $newDetails);
    public function deleteBarang($id);
}
