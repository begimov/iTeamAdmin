<?php

namespace App\Models\Content;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
}
