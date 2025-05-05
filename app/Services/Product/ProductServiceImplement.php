<?php

namespace App\Services\Product;

use LaravelEasyRepository\ServiceApi;
use App\Repositories\Product\ProductRepository;

class ProductServiceImplement extends ServiceApi implements ProductService{

    /**
     * set title message api for CRUD
     * @param string $title
     */
     protected $title = "";
     /**
     * uncomment this to override the default message
     * 
     
     */
    protected $create_message = "";
    protected $update_message = "";
    protected $delete_message = "";
     /**
     * don't change $this->mainRepository variable name
     * because used in extends service class
     */
     protected $mainRepository;

    public function __construct(ProductRepository $mainRepository)
    {
      $this->mainRepository = $mainRepository;
    }
    public function getAllBarang()
    {
        return $this->mainRepository->getAllBarang();
    }

    public function getBarangById($id)
    {
        return $this->mainRepository->getBarangById($id);
    }
    public function createBarang(array $barangDetails)
    {
        return $this->mainRepository->createBarang($barangDetails);
    }
   

    public function updateBarang($id, array $newDetails)
    {
        return $this->mainRepository->updateBarang($id, $newDetails);
    }

    public function deleteBarang($id)
    {
        return $this->mainRepository->deleteBarang($id);
    }
   
}
