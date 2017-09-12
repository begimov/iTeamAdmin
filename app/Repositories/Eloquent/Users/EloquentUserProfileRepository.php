<?php

namespace App\Repositories\Eloquent\Products;

use App\Repositories\Contracts\Users\UserProfileRepository;
use App\Models\Users\UserProfile;

class EloquentUserProfileRepository implements UserProfileRepository
{
    public function whereLike($column, $query)
    {
        //
    }
}
