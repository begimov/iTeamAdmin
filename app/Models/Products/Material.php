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
    
    public function files()
    {
        return $this->hasMany(File::class);
    }

    public function resources()
    {
        return $this->morphMany('App\Models\Content\Resource', 'resourceable');
    }
}
