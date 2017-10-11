<?php

namespace App\Http\Controllers\Webapi\Products;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;

use App\Repositories\Contracts\Products\OrderRepository;

use App\Models\Products\Product;
use App\Models\Payments\PaymentType;
use App\Models\Payments\PaymentState;
use App\Models\Users\BusinessEntity;

use App\Transformers\Products\OrderTransformer;
use App\Transformers\Products\ProductTransformer;
use App\Transformers\Payments\PaymentTypeTransformer;
use App\Transformers\Payments\PaymentStateTransformer;
use App\Transformers\Users\BusinessEntityTransformer;

use App\Http\Requests\Webapi\Products\StoreOrderRequest;


class OrderController extends Controller
{
    protected $orders;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(OrderRepository $orders)
    {
        $this->orders = $orders;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return $this->orders->filter($request)->get();

        $orders = $this->orders
            ->sortedAndFilteredOrders(json_decode($request->all()['params'], true), 5);

        $ordersCollection = $orders->getCollection();

        return fractal()
            ->collection($ordersCollection)
            ->parseIncludes(['user', 'user.userProfile', 'paymentType', 'product'])
            ->transformWith(new OrderTransformer)
            ->paginateWith(new IlluminatePaginatorAdapter($orders))
            ->toArray();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = fractal(Product::all(), new ProductTransformer)->toArray();
        $paymentTypes = fractal(PaymentType::all(), new PaymentTypeTransformer)->toArray();
        $paymentStates = fractal(PaymentState::all(), new PaymentStateTransformer)->toArray();
        $businessEntities = fractal(BusinessEntity::all(), new BusinessEntityTransformer)->toArray();

        return response()->json([
            'products' => $products,
            'paymentTypes' => $paymentTypes,
            'paymentStates' => $paymentStates,
            'businessEntities' => $businessEntities,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrderRequest $request)
    {
        $this->orders->store($request->data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->orders->destroyById($id);
    }
}
