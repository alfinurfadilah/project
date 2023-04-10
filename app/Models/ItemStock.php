<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ItemStock extends Model
{
    use HasFactory;
    use SoftDeletes;

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

    public function item()
    {
        return $this->belongsTo(Item::class, 'item_id');
    }

    public function itemHistory()
    {
        return $this->hasMany(ItemHistory::class, 'id', 'item_stock_id');
    }

    public function itemQty()
    {
        return $this->hasOne(ItemQty::class, 'id', 'item_qty_id');
    }

    public function itemPrice()
    {
        return $this->hasOne(itemPrice::class, 'id', 'item_price_id');
    }
}
