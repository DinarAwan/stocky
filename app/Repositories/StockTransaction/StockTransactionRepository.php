<?php

namespace App\Repositories\StockTransaction;

use LaravelEasyRepository\Repository;

interface StockTransactionRepository extends Repository{

    public function getAllStock();
    public function getStokById($id);

    public function createStok(array $stokDetails);

    public function updateStok($id, array $newDetails);
    public function deleteStok($id);
    // public function getAllWithStock();

    public function getStockByType($type);

    public function getTransByStatus();

}
