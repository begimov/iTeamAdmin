<?php

namespace App\Http\Controllers\Pages;

use App\Models\Pages\Page;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Repositories\Contracts\Products\CategoryRepository;

class PageController extends Controller
{
    protected $categories;

    public function __construct(CategoryRepository $categories)
    {
        $this->categories = $categories;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = $this->categories->get();

        return view('pages.index', compact('categories'));
    }
}
