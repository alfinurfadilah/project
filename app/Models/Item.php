<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $table = 'items';

    protected $fillable = [
        'item_category_id', 
        'item_type_id', 
        'uom_id',
        'code',
        'name',
        'img_url',
        'discount',
        'description',
        'created_by', 
        'updated_by'
    ];
}
