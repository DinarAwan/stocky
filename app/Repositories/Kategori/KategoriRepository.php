<?php

namespace App\Repositories\Kategori;

use LaravelEasyRepository\Repository;

interface KategoriRepository extends Repository{

    // Write something awesome :)
    public function getAll();
    public function getPaginated($perPage);
    public function getById($id);
    public function createKategori(array $kategoriDetails);

    public function updateKategori($id, array $newDetails);
    public function deleteKategori($id);
}
