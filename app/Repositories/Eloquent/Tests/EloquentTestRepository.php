<?php

namespace App\Repositories\Eloquent\Tests;

use App\Repositories\EloquentRepositoryAbstract;
use App\Repositories\Contracts\Tests\TestRepository;
use App\Models\Tests\Test;
use App\Services\App\Tests\TestAbstract;

class EloquentTestRepository extends EloquentRepositoryAbstract implements TestRepository
{
    public function entity()
    {
        return Test::class;
    }

    public function store($request)
    {
        $payload = $request->all();

        $test = TestAbstract::create($payload['test_type_id']);

        $test->store($payload);
    }
}
