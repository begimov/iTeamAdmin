<?php

namespace App\Repositories\Eloquent\Products;

use App\Repositories\Contracts\Products\OrderRepository;
use App\Models\Products\Order;

class EloquentOrderRepository implements OrderRepository
{
    public function getSortedAndFiltered(array $parameters)
    {
        $sortParams = array_filter($parameters, function($value) {
            return $value != 0;
        });

        return (empty($sortParams)) ? $this->getAllLatest() : $this->sortBy($sortParams);
    }

    protected function sortBy(array $sortParams) {

        foreach ($sortParams as $parameter => $value) {

            switch ($parameter) {
              case 'latest':
                return ($value == 1) ? $this->getAllLatest() : $this->getAllOldest();
                break;
              case 'largestIds':
                return ($value == 1) ? $this->orderBy('id', 'desc') : $this->orderBy('id', 'asc');
                break;
              default:
                return $this->getAllLatest();
                break;
            }
        }
    }

    protected function getAllLatest() {
        return Order::latest();
    }

    protected function getAllOldest() {
        return Order::oldest();
    }

    protected function orderBy($column, $order)
    {
        return Order::orderBy($column, $order);
    }
}
