<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemCategoryType extends Model
{
    use HasFactory;
    
    protected $table = 'item_category_types';

    protected $fillable = [
        'name', 'description'
    ];
}
