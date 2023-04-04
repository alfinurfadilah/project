<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemStock extends Model
{
    use HasFactory;

    protected $table = 'item_stocks';

    protected $fillable = [
        'item_id', 
        'batch_stock', 
        'item_qty_id', 
        'item_price_id', 
        'expired_date', 
        'production_date', 
        'created_by',
        'updated_by'
    ];
    
    public function itemQty()
    {
        return $this->hasOne(ItemQty::class, 'id');
    }

    public function itemPrice()
    {
        return $this->hasOne(itemPrice::class, 'id');
    }
}
