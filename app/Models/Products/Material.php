<?php

namespace App\Models\Products;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Content\File;

class Material extends Model
{
    public function files()
    {
        return $this->hasMany(File::class);
    }
}
