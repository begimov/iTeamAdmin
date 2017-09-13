<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Contracts\UserRepository;
use App\User;

class EloquentUserRepository implements UserRepository
{
    public function whereLike($column, $query, $limit)
    {
        return User::where($column, 'like', "%{$query}%")->take($limit)->get();
    }
}
