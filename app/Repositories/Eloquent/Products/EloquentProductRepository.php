<?php

namespace App\Repositories\Eloquent\Products;

use App\Repositories\Contracts\Products\ProductRepository;

use App\Models\Products\Product;

use App\Services\EloquentQueryBuilder;

class EloquentProductRepository implements ProductRepository
{
    protected $queryBuilder;

    public function __construct()
    {
        // $this->queryBuilder = new EloquentQueryBuilder(Order::class);
    }

    public function sortedAndFilteredOrders(array $parameters, $paginateBy)
    {
        dd($parameters, $paginateBy);
        // $filterParams = array_filter($parameters['filters'], function($value) {
        //     return !empty($value);
        // });
        //
        // $orderByParams = array_filter($parameters['orderBy'], function($value) {
        //     return $value != '';
        // });
        //
        // return $this->queryBuilder
        //     ->filterBy($filterParams)
        //     ->orderBy($orderByParams)
        //     ->search($parameters['searchQuery'], 'user', ['email', 'name'])
        //     ->with(['user', 'paymentType', 'product', 'user.userProfile'])
        //     ->withTrashed()
        //     ->build()
        //     ->paginate($paginateBy);
    }
}
