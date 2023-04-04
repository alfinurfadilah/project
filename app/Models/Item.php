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

    public function itemCategories(){
        return $this->belongsTo(ItemCategories::class, 'item_category_id');
    }

    public function itemType(){
        return $this->belongsTo(ItemType::class, 'item_type_id');
    }

    public function uom(){
        return $this->belongsTo(Uom::class, 'uom_id');
    }

    public function itemStock()
    {
        return $this->hasMany(ItemStock::class, 'item_id');
    }
}
