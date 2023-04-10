<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ItemCategories extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'item_categories';

    protected $fillable = [
        'name', 'description', 'created_by', 'updated_by'
    ];
}
