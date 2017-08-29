<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\Landings\LandingRepository;

class HomeController extends Controller
{
    protected $landings;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(LandingRepository $landings)
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
        return view('home.index', compact('landings'));
    }
}
