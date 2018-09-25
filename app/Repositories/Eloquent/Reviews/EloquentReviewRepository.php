<?php

namespace App\Repositories\Eloquent\Reviews;

use App\Repositories\EloquentRepositoryAbstract;
use App\Repositories\Contracts\Reviews\ReviewRepository;
use App\Models\Reviews\Review;

class EloquentReviewRepository extends EloquentRepositoryAbstract implements ReviewRepository
{
    public function entity()
    {
        return Review::class;
    }

    public function store($request)
    {
        dd($request->all());
        $this->entity->create($request->only($this->getEntityFields()));
    }

    protected function getEntityFields()
    {
        return [
            'author', 'position', 'quote'
        ];
    }
}
