<?php

namespace App\Repositories\Eloquent\Products;

use App\Repositories\Contracts\Products\OrderRepository;
use App\Models\Products\Order;
use App\Services\Products\EloquentOrderQueryBuilder;

class EloquentOrderRepository implements OrderRepository
{
    protected $queryBuilder;

    public function __construct(EloquentOrderQueryBuilder $queryBuilder)
    {
        $this->queryBuilder = $queryBuilder;
    }

    public function getSortedAndFiltered(array $parameters)
    {
        $filterParams = array_filter($parameters['filters'], function($value) {
            return !empty($value);
        });

        $orderByParams = array_filter($parameters['orderBy'], function($value) {
            return $value != '';
        });

        return $this->queryBuilder
            ->filterBy($filterParams)
            ->sortBy($orderByParams)
            ->search($parameters['searchQuery'])
            ->with(['user', 'paymentType', 'product', 'user.userProfile'])
            ->build();
    }
}
