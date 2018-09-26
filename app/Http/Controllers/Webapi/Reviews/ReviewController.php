<?php

namespace App\Http\Controllers\Webapi\Reviews;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Transformers\Reviews\ReviewTransformer;
use App\Repositories\Contracts\Reviews\ReviewRepository;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;

class ReviewController extends Controller
{
    protected $reviews;

    public function __construct(ReviewRepository $reviews)
    {
        $this->reviews = $reviews;
    }

    public function index(Request $request)
    {
        $reviews = $this->reviews
            ->filter($request)
            ->paginate(20);

        $reviewsCollection = $reviews->getCollection();

        return fractal()
            ->collection($reviewsCollection)
            ->transformWith(new ReviewTransformer)
            ->paginateWith(new IlluminatePaginatorAdapter($reviews))
            ->toArray();
    }

    public function store(Request $request)
    {
        $this->reviews->store($request);
    }
}
