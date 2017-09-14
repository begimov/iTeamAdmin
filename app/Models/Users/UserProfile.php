<?php

namespace App\Models\Users;

use Illuminate\Database\Eloquent\Model;
use App\Models\Users\Company;

class UserProfile extends Model
{
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
