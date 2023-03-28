<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemCategories extends Model
{
    use HasFactory;

    protected $table = 'item_categories';

    protected $fillable = [
        'item_category_type_id', 'name', 'description'
    ];

    public function itemCategoryType(){
        return $this->belongsTo(ItemCategoryType::class);
    }
}
