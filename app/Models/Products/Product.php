<?php

namespace App\Models\Products;

use Illuminate\Database\Eloquent\Model;

use App\Models\Products\Category;

class Product extends Model
{
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
