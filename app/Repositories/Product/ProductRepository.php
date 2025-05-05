<?php

namespace App\Repositories\Product;

use LaravelEasyRepository\Repository;

interface ProductRepository extends Repository{

    public function getAllBarang();
    public function getBarangById($id);
    public function createBarang(array $barangDetails);
    public function updateBarang($id, array $newDetails);
    public function deleteBarang($id);
}
