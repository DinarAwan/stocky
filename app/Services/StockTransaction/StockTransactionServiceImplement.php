<?php

namespace App\Services\StockTransaction;

use LaravelEasyRepository\ServiceApi;
use App\Repositories\StockTransaction\StockTransactionRepository;

class StockTransactionServiceImplement extends ServiceApi implements StockTransactionService{

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
     /**
     * don't change $this->mainRepository variable name
     * because used in extends service class
     */
     protected $mainRepository;

    public function __construct(StockTransactionRepository $mainRepository)
    {
      $this->mainRepository = $mainRepository;
    }

    public function getAllStok(){
      return $this->mainRepository->getAllStock();
    }

    public function getStokById($id){
        return $this->mainRepository->getStokById($id);
    }

    public function createStok(array $stokDetails){
      return $this->mainRepository->createStok($stokDetails);
    }
}
