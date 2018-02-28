<?php

namespace App\Models\Pages;

use Illuminate\Database\Eloquent\Model;

/**
 * Represents Element of a Page using Block as view and Contents as data
 */
class Element extends Model
{
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'data' => 'array',
    ];
    
    public function block()
    {
        return $this->belongsTo(Block::class);
    }
}
