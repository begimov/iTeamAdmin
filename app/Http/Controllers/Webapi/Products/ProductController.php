<?php

namespace App\Http\Controllers\Webapi\Products;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;

use App\Repositories\Contracts\Products\ProductRepository;
use App\Repositories\Contracts\Products\CategoryRepository;

use App\Repositories\Eloquent\Criteria\With;

use App\Transformers\Products\ProductTransformer;
use App\Transformers\Products\CategoryTransformer;

class ProductController extends Controller
{
    protected $products;
    protected $categories;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ProductRepository $products,
        CategoryRepository $categories)
    {
        $this->products = $products;
        $this->categories = $categories;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products = $this->products->filter($request)
            ->withCriteria([
                new With(['category','priceTags'])
            ])
            ->paginate(5);

        $productsCollection = $products->getCollection();

        return fractal()
            ->collection($productsCollection)
            ->parseIncludes(['category', 'priceTags'])
            ->transformWith(new ProductTransformer)
            ->paginateWith(new IlluminatePaginatorAdapter($products))
            ->toArray();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = fractal($this->categories->get(), new CategoryTransformer)->toArray();

        return response()->json([
            'categories' => $categories,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $this->products->destroyById($id);
    }
}
