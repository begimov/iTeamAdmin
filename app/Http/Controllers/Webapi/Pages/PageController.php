<?php

namespace App\Http\Controllers\Webapi\Pages;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;

use App\Repositories\Contracts\Pages\PageRepository;
use App\Repositories\Contracts\Pages\BlockRepository;
use App\Repositories\Contracts\Products\CategoryRepository;

use App\Transformers\Pages\PageTransformer;
use App\Transformers\Pages\BlockTransformer;
use App\Transformers\Products\CategoryTransformer;

use App\Models\Pages\Block;

class PageController extends Controller
{
    protected $pages;
    protected $categories;
    protected $blocks;
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        PageRepository $pages, 
        CategoryRepository $categories,
        BlockRepository $blocks)
    {
        $this->pages = $pages;
        $this->categories = $categories;
        $this->blocks = $blocks;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pages = $this->pages->filter($request)
            ->paginate(5);

        $pagesCollection = $pages->getCollection();

        return fractal()
            ->collection($pagesCollection)
            ->parseIncludes(['category'])
            ->transformWith(new PageTransformer)
            ->paginateWith(new IlluminatePaginatorAdapter($pages))
            ->toArray();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $blocks = fractal($this->blocks->get(), new BlockTransformer)->toArray();
        $categories = fractal($this->categories->get(), new CategoryTransformer)->toArray();

        return response()->json([
            'blocks' => $blocks,
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
        $page = $this->pages->store($request->all()['page']);
        return response()->json([
            'page' => fractal($page, new PageTransformer)->toArray(),
        ]);
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
        // $this->products->destroyById($id);
    }
}
