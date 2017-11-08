<?php

namespace App\Repositories;

interface RepositoryInterface
{
    public function get();
    public function filter($request);
    public function paginate($by);
}
