<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Transaction extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'transactions';

    protected $fillable = [
        'qty_out',
        'total',
        'tax',
        'money_changes',
        'payment',
        'discount_user',
        'service_charge',
        'sub_total',
        'user_id',
        'created_by',
        'updated_by'
    ];

    public function item()
    {
        return $this->belongsTo(Item::class, 'item_id');
    }
}
