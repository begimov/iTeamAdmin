<?php

namespace App\Repositories;

interface RepositoryInterface
{
    public function filter($request);
    public function whereLike($column, $query, $limit);
}
