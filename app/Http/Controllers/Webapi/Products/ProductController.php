<?php

namespace App\Http\Controllers\Webapi\Products;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;

use App\Http\Requests\Webapi\Products\StoreProductRequest;

use App\Repositories\Contracts\Products\{
    ProductRepository,
    CategoryRepository,
    MaterialRepository
};

use App\Repositories\Contracts\Tests\TestRepository;

use App\Repositories\Eloquent\Criteria\{
    With,
    Where
};

use App\Transformers\Products\{
    ProductTransformer,
    CategoryTransformer,
    MaterialTransformer
};

use App\Transformers\Tests\TestTransformer;

class ProductController extends Controller
{
    protected $products;

    protected $categories;

    protected $materials;

    protected $tests;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ProductRepository $products,
        CategoryRepository $categories,
        MaterialRepository $materials,
        TestRepository $tests)
    {
        $this->products = $products;

        $this->categories = $categories;

        $this->materials = $materials;

        $this->tests = $tests;
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
            ->highestIdsFirst()
            ->paginate(20);

        $productsCollection = $products->getCollection();

        return fractal()
            ->collection($productsCollection)
            ->parseIncludes(['category', 'priceTags'])
            ->transformWith(new ProductTransformer)
            ->paginateWith(new IlluminatePaginatorAdapter($products))
            ->toArray();
    }

    public function all(Request $request)
    {
        $products = $this->products
            ->withCriteria([
                new With(['priceTags'])
            ])
            ->get();

        return fractal()
            ->collection($products)
            ->parseIncludes(['priceTags'])
            ->transformWith(new ProductTransformer)
            ->toArray();
    }

    public function getFreeProducts(Request $request)
    {
        $products = $this->products
            ->withCriteria([
                new Where('price', 0)
            ])
            ->get();

        return fractal()
            ->collection($products)
            ->transformWith(new ProductTransformer)
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
        $materials = fractal($this->materials->get(), new MaterialTransformer)->toArray();
        $tests = fractal($this->tests->get(), new TestTransformer)->toArray();

        return response()->json([
            'categories' => $categories,
            'materials' => $materials,
            'tests' => $tests,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        $this->products->store($request);
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
        $product = $this->products->findById($id);

        return fractal()
            ->item($product)
            ->parseIncludes(['category', 'priceTags', 'materials', 'tests'])
            ->transformWith(new ProductTransformer)
            ->toArray();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreProductRequest $request, $id)
    {
        $this->products->update($request, $id);
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
