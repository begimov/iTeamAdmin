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

        if (empty($sortParams)) {
            return $this->getAllLatest();
        }

        return $this->sortBy($sortParams);
    }

    protected function sortBy(array $sortParams) {

        foreach ($sortParams as $key => $value) {

            switch ($key) {
              case 'latest':
                return ($value == 1) ? $this->getAllLatest() : $this->getAllOldest();
                break;
              case 'largestIds':
                //
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
}
