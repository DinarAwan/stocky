<?php

namespace App\Services\Supplier;

use LaravelEasyRepository\BaseService;

interface SupplierService extends BaseService{

    public function getAllSupplier();
    public function getSupplierById($id);
    public function createSupplier(array $supplierDetails);
    public function updateSupplier($id, array $newDetails);

    public function deleteSupplier($id);
}
