<?php

namespace App\Models\Pages;

use Illuminate\Database\Eloquent\Model;

/**
 * Represents view of an Element of a Page
 */
class Block extends Model
{
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'data' => 'array',
    ];
}
