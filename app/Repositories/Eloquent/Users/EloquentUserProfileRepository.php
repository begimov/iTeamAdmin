<?php

namespace App\Repositories\Eloquent\Users;

use App\Repositories\EloquentRepositoryAbstract;
use App\Repositories\Contracts\Users\UserProfileRepository;
use App\Models\Users\UserProfile;

class EloquentUserProfileRepository extends EloquentRepositoryAbstract implements UserProfileRepository
{
    public function entity()
    {
        return UserProfile::class;
    }
}
