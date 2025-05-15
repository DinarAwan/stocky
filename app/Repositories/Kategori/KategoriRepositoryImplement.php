<?php

namespace App\Repositories\Kategori;

use App\Models\Kategori;
use App\Models\KategoriModel;
use LaravelEasyRepository\Implementations\Eloquent;

class KategoriRepositoryImplement extends Eloquent implements KategoriRepository{

    /**
    * Model class to be used in this repository for the common methods inside Eloquent
    * Don't remove or change $this->model variable name
    * @property Model|mixed $model;
    */
    protected $model;

    public function __construct(KategoriModel $model)
    {
        $this->model = $model;
    }

    // Write something awesome :)

    public function getAll()
    {
        return $this->model->orderBy('kategori', 'asc')->get();
    }

    public function getPaginated($perPage = 10)
    {
        return $this->model->orderBy('id', 'asc')->paginate($perPage);
    }

    public function getById($id)
    {
        return $this->model->findOrFail($id);
    }

    public function createKategori(array $kategoriDetails)
    {
        return $this->model->create($kategoriDetails);
    }

    public function updateKategori($id, array $newDetails)
    {
        // Hapus field _token dan _method jika ada
        if (isset($newDetails['_token'])) {
            unset($newDetails['_token']);
        }
        if (isset($newDetails['_method'])) {
            unset($newDetails['_method']);
        }
        
        return $this->model->whereId($id)->update($newDetails);
    }

    public function deleteKategori($id)
    {
        return $this->model->destroy($id);
    }
}
