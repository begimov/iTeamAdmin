<?php

namespace App\Http\Controllers\Webapi\Reviews;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\Reviews\ReviewRepository;

class ReviewController extends Controller
{
    protected $reviews;

    public function __construct(ReviewRepository $reviews)
    {
        $this->reviews = $reviews;
    }

    public function index()
    {
        return 1;
    }
}
