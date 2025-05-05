<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockTransaction extends Model
{
    use HasFactory;
    protected $table = 'stock_transaction';

    protected $fillable = ['type', 'quantity', 'date', 'status', 'catatan'];
}
