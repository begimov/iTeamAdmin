<?php

namespace App\Models\Products;

use Illuminate\Database\Eloquent\Model;
use App\Models\Products\Product;

class PriceTag extends Model
{
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
