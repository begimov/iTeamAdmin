<?php

namespace App\Models\Products;

use Illuminate\Database\Eloquent\Model;
use App\Models\Products\Product;

class PriceTag extends Model
{
    protected $fillable = ['name', 'price', 'product_id'];
    
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
