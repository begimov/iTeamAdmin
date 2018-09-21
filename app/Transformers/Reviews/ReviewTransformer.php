<?php

namespace App\Transformers\Reviews;

use App\Models\Reviews\Review;

class ReviewTransformer extends \League\Fractal\TransformerAbstract
{
    protected $availableIncludes = [];

    public function transform(Review $review)
    {
        return [
            'id' => $review->id,
            'author' => $review->author,
            'position' => $review->position,
            'quote' => $review->quote,
        ];
    }
}
