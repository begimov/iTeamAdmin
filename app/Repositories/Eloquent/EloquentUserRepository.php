<?php

namespace App\Repositories\Eloquent;

use App\Repositories\EloquentRepositoryAbstract;
use App\Repositories\Contracts\UserRepository;
use App\User;

class EloquentUserRepository extends EloquentRepositoryAbstract implements UserRepository
{
    public function entity()
    {
        return User::class;
    }
}
