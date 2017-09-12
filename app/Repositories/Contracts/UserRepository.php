<?php

namespace App\Repositories\Contracts;

interface UserRepository
{
    public function whereLike($column, $query);
}
