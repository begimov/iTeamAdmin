<?php

namespace App\Repositories\Eloquent\Products;

use App\Repositories\Contracts\Products\OrderRepository;
use App\Models\Products\Order;

class EloquentOrderRepository implements OrderRepository
{
    public function getSortedAndFiltered($parameters)
    {
        $paramsArr = json_decode($parameters['orderBy'], true);
        $paramsArr = array_filter($paramsArr, function($value) {
            return $value != 0;
        });
        dd($paramsArr);
    }
}
