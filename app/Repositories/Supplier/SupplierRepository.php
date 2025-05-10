<?php

namespace App\Repositories\Supplier;

use LaravelEasyRepository\Repository;

interface SupplierRepository extends Repository{

    public function getAllSupplier();
    public function getSupplierById($id);
    public function createSupplier(array $supplierDetails);

    public function updateSupplier($id, array $newDetails);

    public function deleteSupplier($id);
}
