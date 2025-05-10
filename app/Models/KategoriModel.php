<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KategoriModel extends Model
{
    use HasFactory;

    protected $table = 'kategori'; 

    protected $fillable = [
        'kategori',
    ];

    public function produks()
    {
        return $this->hasMany(Product::class, 'kategori_id', 'id');
    }
}
