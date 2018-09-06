<?php

namespace App\Http\Controllers\Webapi\Tests;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Transformers\Tests\{
    TestTransformer,
    TestTypeTransformer
};
use App\Repositories\Contracts\Tests\{
    TestRepository,
    TestTypeRepository
};
use League\Fractal\Pagination\IlluminatePaginatorAdapter;

class TestController extends Controller
{
    protected $tests;

    protected $testTypes;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        TestRepository $tests,
        TestTypeRepository $testTypes
    )
    {
        $this->tests = $tests;

        $this->testTypes = $testTypes;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tests = $this->tests
            ->filter($request)
            ->paginate(20);

        $testsCollection = $tests->getCollection();

        return fractal()
            ->collection($testsCollection)
            ->transformWith(new TestTransformer)
            ->paginateWith(new IlluminatePaginatorAdapter($tests))
            ->toArray();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $testTypes = fractal($this->testTypes->get(), new TestTypeTransformer)->toArray();

        return response()->json([
            'types' => $testTypes
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
        dd($request->all());
        return $this->tests->store($request);
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
}
