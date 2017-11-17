<?php

namespace App\Models\Products;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Content\File;

class Material extends Model
{
    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('hasName', function (Builder $builder) {
            $builder->whereNotNull('name');
        });
    }

    public function files()
    {
        return $this->hasMany(File::class);
    }
}
