<?php

namespace App\Models\Products;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Filters\Products\ProductFilters;
use App\Models\Tests\Test;

class Product extends Model
{
    use SoftDeletes;

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    protected $fillable = ['name', 'price', 'category_id'];

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

    public function tests()
    {
        return $this->belongsToMany(Test::class, 'products_tests');
    }

    public function scopeFilter($builder, $repository, $request, array $filters = [])
    {
        return (new ProductFilters($request))->add($filters)->filter($repository);
    }
}
