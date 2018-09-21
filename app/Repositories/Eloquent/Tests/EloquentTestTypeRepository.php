<?php

namespace App\Repositories\Eloquent\Tests;

use App\Repositories\EloquentRepositoryAbstract;
use App\Repositories\Contracts\Tests\TestTypeRepository;
use App\Models\Tests\TestType;

class EloquentTestTypeRepository extends EloquentRepositoryAbstract implements TestTypeRepository
{
    public function entity()
    {
        return TestType::class;
    }
}
