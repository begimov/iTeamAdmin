<?php

namespace App\Http\Controllers\Webapi\Products;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;

use App\Repositories\Contracts\Products\{ OrderRepository, ProductRepository };
use App\Repositories\Contracts\Payments\{ PaymentTypeRepository, PaymentStateRepository };
use App\Repositories\Contracts\Users\BusinessEntityRepository;

use App\Transformers\Products\{ OrderTransformer, ProductTransformer };
use App\Transformers\Payments\{ PaymentTypeTransformer, PaymentStateTransformer };
use App\Transformers\Users\BusinessEntityTransformer;

use App\Repositories\Eloquent\Criteria\With;

use App\Http\Requests\Webapi\Products\StoreOrderRequest;


class OrderController extends Controller
{
    protected $orders;
    protected $paymentTypes;
    protected $paymentStates;
    protected $products;
    protected $businessEntities;
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(OrderRepository $orders,
        PaymentTypeRepository $paymentTypes,
        PaymentStateRepository $paymentStates,
        ProductRepository $products,
        BusinessEntityRepository $businessEntities)
    {
        $this->orders = $orders;
        $this->paymentTypes = $paymentTypes;
        $this->paymentStates = $paymentStates;
        $this->products = $products;
        $this->businessEntities = $businessEntities;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $orders = $this->orders->filter($request)
            ->withCriteria([
                new With(['user', 'paymentType', 'product', 'user.userProfile'])
            ])
            ->paginate(5);

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
        $products = fractal($this->products->get(), new ProductTransformer)->toArray();
        $paymentTypes = fractal($this->paymentTypes->get(), new PaymentTypeTransformer)->toArray();
        $paymentStates = fractal($this->paymentStates->get(), new PaymentStateTransformer)->toArray();
        $businessEntities = fractal($this->businessEntities->get(), new BusinessEntityTransformer)->toArray();

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
        $this->orders->store($request->all());
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
        $order = $this->orders->findById($id);

        return fractal()
            ->item($order)
            ->parseIncludes(['user', 'paymentType', 'product', 'paymentState'])
            ->transformWith(new OrderTransformer)
            ->toArray();
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
        $this->orders->update($request->all(), $id);
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
