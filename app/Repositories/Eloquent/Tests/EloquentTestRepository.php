<?php

namespace App\Repositories\Eloquent\Tests;

use App\Repositories\EloquentRepositoryAbstract;
use App\Repositories\Contracts\Tests\TestRepository;
use App\Models\Tests\Test;

class EloquentTestRepository extends EloquentRepositoryAbstract implements TestRepository
{
    public function entity()
    {
        return Test::class;
    }
}
