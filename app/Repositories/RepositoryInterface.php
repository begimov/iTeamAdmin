<?php

namespace App\Repositories;

interface RepositoryInterface
{
    public function get();
    public function filter($request);
    public function paginate($by);
    public function highestIdsFirst();
    public function withTrashed();
    public function findById($id);
}
