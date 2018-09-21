<?php

namespace App\Repositories\Eloquent\Reviews;

use App\Repositories\EloquentRepositoryAbstract;
use App\Repositories\Contracts\Tests\ReviewRepository;
use App\Models\Reviews\Review;

class EloquentReviewRepository extends EloquentRepositoryAbstract implements ReviewRepository
{
    public function entity()
    {
        return Review::class;
    }
}
