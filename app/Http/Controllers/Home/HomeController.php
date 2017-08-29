<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\LandingRepository;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(LandingRepository $landings)
    {
        $this->middleware('auth');
        $this->landings = $landings;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $landings = $this->landings->getFewLatest(5);
        
        return view('home.index', compact('landings'));
    }
}
