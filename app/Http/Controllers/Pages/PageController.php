<?php

namespace App\Http\Controllers\Pages;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        // TODO: REMOVE TEST
        $pages = \App\Models\Pages\Page::with([
                'elements',
                'elements.contents',
                'elements.block',
            ])
            ->get();
        dd($pages);

        return view('pages.index');
    }
}
