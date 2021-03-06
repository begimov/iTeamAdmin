<?php

namespace App\Http\Controllers\Webapi\Pages;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;

use App\Repositories\Contracts\Pages\{ 
    PageRepository,
    BlockRepository,
    ThemeRepository
};
use App\Repositories\Contracts\Products\CategoryRepository;

use App\Transformers\Pages\{
    PageTransformer,
    BlockTransformer,
    ThemeTransformer
};
use App\Transformers\Products\CategoryTransformer;

use App\Repositories\Eloquent\Criteria\With;

use App\Models\Pages\Block;

use App\Http\Requests\Webapi\Pages\StorePageRequest;

class PageController extends Controller
{
    protected $pages;
    protected $categories;
    protected $blocks;
    protected $themes;
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        PageRepository $pages, 
        CategoryRepository $categories,
        BlockRepository $blocks,
        ThemeRepository $themes)
    {
        $this->pages = $pages;
        $this->categories = $categories;
        $this->blocks = $blocks;
        $this->themes = $themes;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pages = $this->pages->filter($request)
            ->withCriteria([
                new With(['category'])
            ])
            ->highestIdsFirst()
            ->paginate(20);

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
        $sortedBlocksCollection = $this->blocks->get()->sortBy('name');

        $blocks = fractal($sortedBlocksCollection, new BlockTransformer)->toArray();
        $categories = fractal($this->categories->get(), new CategoryTransformer)->toArray();
        $themes = fractal($this->themes->get(), new ThemeTransformer)->toArray();

        return response()->json([
            'blocks' => $blocks,
            'categories' => $categories,
            'themes' => $themes
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePageRequest $request)
    {
        $page = $this->pages->store($request);
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
        $page = $this->pages->findById($id);

        return fractal()
            ->item($page)
            ->parseIncludes(['category', 'theme', 'elements', 'elements.block'])
            ->transformWith(new PageTransformer)
            ->toArray();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StorePageRequest $request, $id)
    {
        $this->pages->update($request, $id);
    }

    public function updateStatus(Request $request, $id)
    {
        $this->pages->updateStatus($request->all(), $id);
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
