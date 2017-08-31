<?php

namespace App\Repositories\Eloquent\Products;

use App\Repositories\Contracts\Products\OrderRepository;
use App\Models\Products\Order;

class EloquentOrderRepository implements OrderRepository
{
    public function getSortedAndFiltered(array $parameters)
    {
        $sortParams = json_decode($parameters['orderBy'], true);
        $sortParams = array_filter($sortParams, function($value) {
            return $value != 0;
        });

        return $this->sortBy($sortParams);
    }

    public function sortBy(array $sortParams) {
        if (empty($sortParams)) {
            return $this->getAllLatest();
        }
        switch ($sortParams[0]) {
          case 'value':
            # code...
            break;

          default:
            # code...
            break;
        }
    }

    public function getAllLatest() {
        return Order::latest();
    }
}
