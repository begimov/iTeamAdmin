<?php

namespace App\Http\Controllers\Pages;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Pages\Page;

class PageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.index');
    }

    public function show(Page $page)
    {
        $page = $page->with([
                'elements',
                'elements.block',
            ])
            ->first();
        return view('pages.page.container', compact('page'));
    }
}
