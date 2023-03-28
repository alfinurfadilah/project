<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemPrice extends Model
{
    use HasFactory;

    protected $table = 'item_prices';

    protected $fillable = [
        'item_id', 'buy_price', 'sell_price'
    ];
}
