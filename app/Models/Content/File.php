<?php

namespace App\Models\Content;

use Illuminate\Database\Eloquent\Model;
use App\Models\Products\Material;
use Illuminate\Database\Eloquent\SoftDeletes;

class File extends Model
{
    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    public function material()
    {
        return $this->belongsTo(Material::class);
    }
}
