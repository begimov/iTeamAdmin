<?php

namespace App\Http\Controllers\Webapi\Products;

use Illuminate\Http\Request;
use App\Http\Requests\Webapi\Products\StoreMaterialRequest;
use App\Http\Controllers\Controller;

use League\Fractal\Pagination\IlluminatePaginatorAdapter;

use App\Models\Products\Material;
use App\Repositories\Contracts\Products\MaterialRepository;
use App\Transformers\Products\MaterialTransformer;
use App\Repositories\Eloquent\Criteria\With;

class MaterialController extends Controller
{
    protected $materials;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(MaterialRepository $materials)
    {
        $this->materials = $materials;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $materials = $this->materials
            // ->filter($request)
            ->highestIdsFirst()
            ->paginate(20);

        $materialsCollection = $materials->getCollection();

        return fractal()
            ->collection($materialsCollection)
            ->transformWith(new MaterialTransformer)
            ->paginateWith(new IlluminatePaginatorAdapter($materials))
            ->toArray();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $material = fractal($this->materials->create(), new MaterialTransformer)->toArray();

        return response()->json([
            'material' => $material,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMaterialRequest $request)
    {
        $this->materials->store($request->all());
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
        $material = $this->materials
            // ->filter($request)
            ->withCriteria([
                new With(['files','resources'])
            ])
            ->findById($id);

        return fractal()
            ->item($material)
            ->parseIncludes(['files', 'resources'])
            ->transformWith(new MaterialTransformer)
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
        //
    }
}
