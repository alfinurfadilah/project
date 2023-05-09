<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class TransactionItem extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'transaction_items';

    protected $fillable = [
        'transaction_id',
        'item_id',
        'selling_price',
        'qty',
        'batch_id',
        'created_by',
        'updated_by'
    ];

    public function item()
    {
        return $this->belongsTo(Item::class, 'item_id');
    }
}
