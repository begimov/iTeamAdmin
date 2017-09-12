<?php

namespace App\Repositories\Eloquent\Users;

use App\Repositories\Contracts\Users\UserProfileRepository;
use App\Models\Users\UserProfile;

class EloquentUserProfileRepository implements UserProfileRepository
{
    public function whereLike($column, $query)
    {
        return UserProfile::where($column, 'like', "%{$query}%")->take(3)->get();
    }
}
