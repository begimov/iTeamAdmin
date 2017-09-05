<?php

namespace App\Repositories\Eloquent\Products;

use App\Repositories\Contracts\Products\OrderRepository;
use App\Models\Products\Order;

class EloquentOrderRepository implements OrderRepository
{
    public function getSortedAndFiltered(array $parameters)
    {
        $filtered = $this->filterBy($parameters['filters']);
        $sortedAndFiltered = $this->sortBy($filtered, $parameters['orderBy']);

        return $sortedAndFiltered->with('user');
    }

    protected function filterBy(array $filterParams)
    {
        $params = array_filter($filterParams, function($value) {
            return !empty($value);
        });

        foreach ($params as $key => $param) {
          $params[$key] = array_map(function($value) {
              return $value['id'];
          }, $param);
        }

        $query = Order::query();

        foreach ($params as $key => $ids) {
          switch ($key) {
            case 'paymentType':
              $query->whereIn('payment_type_id', $ids);
              break;

            case 'paymentState':
              $query->whereIn('payment_state_id', $ids);
              break;

            default:
              break;
          }
        }

        return $query;
    }

    protected function sortBy($filteredOrders, array $orderByParams) {

        $orderByActiveParam = array_filter($orderByParams, function($value) {
            return $value != 0;
        });

        if ((empty($orderByActiveParam))) {
            return $filteredOrders->latest();
        }

        foreach ($orderByActiveParam as $parameter => $value) {

            switch ($parameter) {
              case 'latest':
                return ($value == 1) ? $filteredOrders->latest()
                    : $filteredOrders->oldest();
                break;
              case 'largestIds':
                return ($value == 1) ? $filteredOrders->orderBy('id', 'desc')
                    : $filteredOrders->orderBy('id', 'asc');
                break;
              default:
                return $this->getAllLatest($filteredOrders);
                break;
            }
        }
    }
}
