<?php

namespace App\Models;


use App\Models\StockTransaction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    protected $table = 'product';

    protected $fillable = ['namaBarang', 'stock', 'deskripsi', 'kategori', 'kategori_id', 'supplier_id', 'harga_beli', 'harga_jual', 'foto'];

    public function kategori()
    {
        return $this->belongsTo(KategoriModel::class, 'kategori_id', 'id');
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id', 'id');
    }

    public function stock_transaction(){
        return $this->hasMany(StockTransaction::class, 'product_id', 'id');
    }
}
