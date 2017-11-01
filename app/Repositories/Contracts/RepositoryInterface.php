<?php

namespace App\Repositories\Contracts;

interface RepositoryInterface
{
    public function filter($request);
    public function whereLike($column, $query, $limit);
}
