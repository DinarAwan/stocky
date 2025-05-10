<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Symfony\Component\Console\Command\DumpCompletionCommand;

class StockTransaction extends Model
{
    use HasFactory;
    protected $table = 'stock_transaction';

    protected $fillable = ['type', 'quantity', 'date', 'status', 'catatan', 'product_id', 'user_id'];

    public function product(){
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function users(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
