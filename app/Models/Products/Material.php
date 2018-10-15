<?php

namespace App\Models\Products;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Content\File;
use App\Filters\Products\MaterialFilters;

class Material extends Model
{
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    protected $fillable = ['name'];

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        // static::addGlobalScope('named', function (Builder $builder) {
        //     $builder->whereNotNull('name');
        // });

        static::creating(function ($material) {
            $material->token = uniqid();
        });
    }
    
    public function files()
    {
        return $this->hasMany(File::class);
    }

    public function resources()
    {
        return $this->morphMany('App\Models\Content\Resource', 'resourceable');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'products_materials');
    }

    public function scopeFilter($builder, $repository, $request, array $filters = [])
    {
        return (new MaterialFilters($request))->add($filters)->filter($repository);
    }
}
