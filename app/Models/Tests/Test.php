<?php

namespace App\Models\Tests;

use Illuminate\Database\Eloquent\Model;
use App\Filters\Tests\TestFilters;

class Test extends Model
{
    public function scopeFilter($builder, $repository, $request, array $filters = [])
    {
        return (new TestFilters($request))->add($filters)->filter($repository);
    }
}
