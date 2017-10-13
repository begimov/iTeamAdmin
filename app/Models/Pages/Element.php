<?php

namespace App\Models\Pages;

use Illuminate\Database\Eloquent\Model;

/**
 * Represents Element of a Page using Block as view and Contents as data
 */
class Element extends Model
{
    public function block()
    {
        return $this->belongsTo(Block::class);
    }

    public function contents()
    {
        return $this->hasMany(Content::class);
    }
}
