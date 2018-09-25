<?php

namespace App\Repositories\Eloquent\Reviews;

use App\Repositories\EloquentRepositoryAbstract;
use App\Repositories\Contracts\Reviews\ReviewRepository;
use App\Models\Reviews\Review;
use App\Models\Content\File;

class EloquentReviewRepository extends EloquentRepositoryAbstract implements ReviewRepository
{
    public function entity()
    {
        return Review::class;
    }

    public function store($request)
    {
        $review = $this->entity->create($request->only($this->getEntityFields()));

        $file = File::find($request->avatar);

        $review->files()->save($file);
    }

    protected function getEntityFields()
    {
        return [
            'author', 'position', 'quote'
        ];
    }
}
