<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemPrice extends Model
{
    use HasFactory;

    protected $table = 'item_prices';

    protected $fillable = [
        'current_price', 
        'price', 
        'discount', 
        'created_by', 
        'updated_by'
    ];
}
