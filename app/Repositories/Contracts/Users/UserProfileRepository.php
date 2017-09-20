<?php

namespace App\Repositories\Contracts\Users;

interface UserProfileRepository
{
    public function whereLike($column, $query, $limit);
}
