<?php

namespace App\Models\Products;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Filters\Products\ProductFilters;

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

    public function materials()
    {
        return $this->belongsToMany(Material::class, 'products_materials');
    }

    public function scopeFilter($builder, $repository, $request, array $filters = [])
    {
        return (new ProductFilters($request))->add($filters)->filter($repository);
    }
}
