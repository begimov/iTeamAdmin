<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Payments\PaymentType;
use App\Models\Payments\PaymentState;

use App\Repositories\Contracts\Payments\PaymentTypeRepository;
use App\Repositories\Contracts\Payments\PaymentStateRepository;

class HomeController extends Controller
{
    protected $paymentTypes;
    protected $paymentStates;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(PaymentTypeRepository $paymentTypes,
        PaymentStateRepository $paymentStates)
    {
        $this->middleware('auth');

        $this->paymentTypes = $paymentTypes;
        $this->paymentStates = $paymentStates;
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
