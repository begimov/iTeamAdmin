<?php

namespace App\Http\Controllers\Pages;

use App\Models\Pages\Page;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Repositories\Contracts\Pages\ThemeRepository;
use App\Repositories\Contracts\Products\CategoryRepository;

class PageController extends Controller
{
    protected $categories;

    protected $themes;

    public function __construct(CategoryRepository $categories, ThemeRepository $themes)
    {
        $this->categories = $categories;

        $this->themes = $themes;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = $this->categories->get();

        $themes = $this->themes->get();

        return view('pages.index', compact('categories', 'themes'));
    }
}
