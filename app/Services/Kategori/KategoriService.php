<?php

namespace App\Services\Kategori;

use LaravelEasyRepository\BaseService;

interface KategoriService extends BaseService{

    // Write something awesome :)
    public function createKategori(array $barangDetails);

    public function updateKategori($id, array $newDetails);

    public function deleteKategori($id);
}
