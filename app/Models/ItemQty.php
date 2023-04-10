<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ItemQty extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'item_qties';

    protected $fillable = [
        'qty',
        'qty_change',
        'created_by',
        'updated_by'
    ];
}
