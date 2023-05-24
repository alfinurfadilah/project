<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemType extends Model
{
    use HasFactory;

    protected $table = 'item_types';

    protected $fillable = [
        'item_category_id', 'name', 'description'
    ];

    public function itemCategory()
    {
        return $this->belongsTo(ItemCategories::class, 'item_category_id');
    }
}
