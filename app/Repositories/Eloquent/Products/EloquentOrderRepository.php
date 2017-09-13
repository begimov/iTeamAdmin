<?php

namespace App\Repositories\Eloquent\Products;

use App\Repositories\Contracts\Products\OrderRepository;
use App\Models\Products\Order;
use App\Services\EloquentQueryBuilder;

class EloquentOrderRepository implements OrderRepository
{
    protected $queryBuilder;

    public function __construct()
    {
        $this->queryBuilder = new EloquentQueryBuilder(Order::class);
    }

    public function sortedAndFilteredOrders(array $parameters, $paginateBy)
    {
        $filterParams = array_filter($parameters['filters'], function($value) {
            return !empty($value);
        });

        $orderByParams = array_filter($parameters['orderBy'], function($value) {
            return $value != '';
        });

        return $this->queryBuilder
            ->filterBy($filterParams)
            ->orderBy($orderByParams)
            ->search($parameters['searchQuery'], 'user', ['email', 'name'])
            ->with(['user', 'paymentType', 'product', 'user.userProfile'])
            ->build()
            ->paginate($paginateBy);
    }

    public function store($data)
    {
        //
    }
}
