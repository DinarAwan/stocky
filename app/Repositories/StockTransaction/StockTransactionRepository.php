<?php

namespace App\Repositories\StockTransaction;

use LaravelEasyRepository\Repository;

interface StockTransactionRepository extends Repository{

    public function getAllStock();
    public function getStokById($id);

    public function createStok(array $stokDetails);
}
