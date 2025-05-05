<?php

namespace App\Services\Kategori;

use LaravelEasyRepository\ServiceApi;
use App\Repositories\Kategori\KategoriRepository;

class KategoriServiceImplement extends ServiceApi implements KategoriService{

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

    public function __construct(KategoriRepository $mainRepository)
    {
      $this->mainRepository = $mainRepository;
    }

    // Define your custom methods :)


    public function getAllCategories(){
      return $this->mainRepository->getAll();
    }

    public function getPaginatedCategories($perPage = 10){
      return $this->mainRepository->getPaginated($perPage);
    }

    public function getCategoryById($id){
      return $this->mainRepository->getById($id);
    }
    public function createKategori(array $KategoriDetails)
    {
        return $this->mainRepository->createKategori($KategoriDetails);
    }

    public function updateKategori($id, array $newDetails)
    {
        return $this->mainRepository->updateKategori($id, $newDetails);
    }
    public function deleteKategori($id)
    {
        return $this->mainRepository->deleteKategori($id);
    }
}
