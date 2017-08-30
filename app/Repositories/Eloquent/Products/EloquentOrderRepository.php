<?php

namespace App\Repositories\Eloquent\Products;

use App\Repositories\Contracts\Products\OrderRepository;
use App\Models\Products\Order;

class EloquentOrderRepository implements OrderRepository
{

    public function getAll()
    {
        return Order::all();
    }

    public function getAllLatestPaginateBy($number)
    {
        return Order::latestFirst()->paginate($number);
    }

}
