<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Payments\PaymentType;
use App\Models\Payments\PaymentState;

class HomeController extends Controller
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
        $paymentTypes = PaymentType::all();
        $paymentStates = PaymentState::all();
        return view('home.index', compact('paymentTypes', 'paymentStates'));
    }
}
