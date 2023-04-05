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

    public function item(){
        return $this->belongsTo(Item::class, 'item_id');
    }

    public function itemHistory(){
        return $this->hasMany(ItemHistory::class, 'item_stock_id');
    }
    
    public function itemQty()
    {
        return $this->hasOne(ItemQty::class, 'id');
    }

    public function itemPrice()
    {
        return $this->hasOne(itemPrice::class, 'id');
    }
}
