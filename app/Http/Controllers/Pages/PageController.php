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
        // $page = \App\Models\Pages\Page::find(1)->with([
        //         'elements',
        //         'elements.contents',
        //         'elements.block',
        //     ])
        //     ->first();
        // return response()->json([
        //     'data' => view('pages.page.blocks.main')->render()
        // ]);
        // return view('pages.page.container', compact('page'));

        return view('pages.index');
    }
}
