<?php

namespace App\Services\Supplier;

use LaravelEasyRepository\ServiceApi;
use App\Repositories\Supplier\SupplierRepository;

class SupplierServiceImplement extends ServiceApi implements SupplierService{

    /**
     * set title message api for CRUD
     * @param string $title
     */
     protected $title = "";
     /**
     * uncomment this to override the default message
     * protected $create_message = "";
     * protected $update_message = "";
     * protected $delete_message = "";
     */
    protected $create_message = "";
    protected $update_message = "";
    protected $delete_message = "";
     /**
     * don't change $this->mainRepository variable name
     * because used in extends service class
     */
     protected $mainRepository;

    public function __construct(SupplierRepository $mainRepository)
    {
      $this->mainRepository = $mainRepository;
    }

    public function getAllSupplier()
    {
        return $this->mainRepository->getAllSupplier();
    }

    public function getSupplierById($id){
      return $this->mainRepository->getSupplierById($id);
    }

    public function createSupplier(array $supplierDetails){
      return $this->mainRepository->createSupplier($supplierDetails);
    }

    public function updateSupplier($id, array $newDetails){
      return $this->mainRepository->updateSupplier($id, $newDetails);
    }

    public function deleteSupplier($id)
    {
      return $this->mainRepository->deleteSupplier($id);
    }
}
