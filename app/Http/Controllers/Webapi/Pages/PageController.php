<?php

namespace App\Http\Controllers\Webapi\Pages;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;

use App\Repositories\Contracts\Pages\PageRepository;

use App\Transformers\Pages\PageTransformer;

class PageController extends Controller
{
    protected $pages;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(PageRepository $pages)
    {
        $this->pages = $pages;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pages = $this->pages
            ->sortedAndFilteredOrders(json_decode($request->all()['params'], true), 5);

        $pagesCollection = $pages->getCollection();

        return fractal()
            ->collection($pagesCollection)
            // ->parseIncludes(['category', 'priceTags'])
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
        return response()->json([
          [
            'id' => 1,
            'name' => 'block-desc',
            'template' => '<div class="row"><div class="col-md-12"><input type="text" v-model="name" class="form-control"></input></div></div>',
            'data' => [
              'name' => '',
            ]
          ],
          [
            'id' => 2,
            'name' => 'block-form',
            'template' => '<div><input type="text" v-model="name"></input><input type="text" v-model="title"></input></div>',
            'data' => [
              'name' => '',
              'title' => '',
            ]
          ]
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
        // $this->products->destroyById($id);
    }
}
