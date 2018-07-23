<?php

namespace App\Models\Products;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Content\File;

class Material extends Model
{
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

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
    }
    
    public function files()
    {
        return $this->hasMany(File::class);
    }

    public function resources()
    {
        return $this->morphMany('App\Models\Content\Resource', 'resourceable');
    }
}
