<?php

namespace App\Models\Pages;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    public function elements()
    {
        return $this->hasMany(Element::class);
    }
}
