<?php

namespace App\Services\StockTransaction;

use LaravelEasyRepository\BaseService;

interface StockTransactionService extends BaseService{

    public function getAllStok();

    public function getStokById($id);
    public function createStok(array $stokDetails);
}
