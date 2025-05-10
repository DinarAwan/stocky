<?php

namespace App\Services\StockTransaction;

use LaravelEasyRepository\BaseService;

interface StockTransactionService extends BaseService{

    public function getAllStok();

    public function getStokById($id);
    public function createStok(array $stokDetails);

    public function updateStok($id, array $newDetails);
    public function deleteStok($id);
    // public function getProductsWithStock();

    public function getStockByType($type);

    public function getTransByStatus();
}
