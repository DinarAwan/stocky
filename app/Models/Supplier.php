<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Supplier extends Model
{
    use HasFactory;

    protected $table = 'suppliers';

    protected $fillable = ['id', 'nama', 'nomor_hp', 'email', 'alamat'];

    public function produks()
    {
        return $this->hasMany(Product::class, 'supplier_id', 'id');
    }
}
