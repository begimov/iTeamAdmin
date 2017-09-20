<?php

namespace App\Models\Users;

use Illuminate\Database\Eloquent\Model;
use App\Models\Users\BusinessEntity;

class Company extends Model
{
    public function businessEntity()
    {
        return $this->belongsTo(BusinessEntity::class);
    }
}
