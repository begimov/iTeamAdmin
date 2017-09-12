<?php

namespace App\Repositories\Eloquent\Products;

use App\Repositories\Contracts\UserRepository;
use App\User;

class EloquentUserRepository implements UserRepository
{
    public function getAll()
    {
        return User::all();
    }
}
