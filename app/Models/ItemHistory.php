<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemHistory extends Model
{
    use HasFactory;
    
    protected $table = 'item_histories';

    protected $fillable = [
        'item_stock_id',
        'qty',
        'qty_change',
        'description',
        'created_by', 
        'updated_by'
    ];

    public function itemStocks(){
        return $this->belongsTo(ItemStock::class, 'item_stock_id');
    }
}
