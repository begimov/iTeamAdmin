<?php

namespace App\Http\Controllers\Webapi\Products;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;

use App\Repositories\Contracts\Products\{
    ProductRepository,
    CategoryRepository,
    MaterialRepository
};

use App\Repositories\Eloquent\Criteria\With;

use App\Transformers\Products\{
    ProductTransformer,
    CategoryTransformer,
    MaterialTransformer
};

class ProductController extends Controller
{
    protected $products;
    protected $categories;
    protected $materials;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ProductRepository $products,
        CategoryRepository $categories,
        MaterialRepository $materials)
    {
        $this->products = $products;
        $this->categories = $categories;
        $this->materials = $materials;
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

    public function all(Request $request)
    {
        $products = $this->products->get();

        return fractal()
            ->collection($products)
            ->parseIncludes(['priceTags'])
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

        return response()->json([
            'categories' => $categories,
            'materials' => $materials,
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
        //TODO: create form request validation
        $this->products->store($request->data);
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
