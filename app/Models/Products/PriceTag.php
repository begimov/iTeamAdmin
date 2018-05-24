<?php

namespace App\Models\Products;

use Illuminate\Database\Eloquent\Model;
use App\Models\Products\Product;

class PriceTag extends Model
{
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
    
    protected $fillable = ['name', 'price', 'product_id'];
    
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
