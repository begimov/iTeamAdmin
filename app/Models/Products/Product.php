<?php

namespace App\Models\Products;

use Illuminate\Database\Eloquent\Model;

use App\Models\Products\Category;
use App\Models\Products\PriceTag;

class Product extends Model
{
    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function priceTags()
    {
        return $this->hasMany(PriceTag::class);
    }
}
