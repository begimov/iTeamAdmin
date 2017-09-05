<?php

namespace App\Repositories\Eloquent\Products;

use App\Repositories\Contracts\Products\OrderRepository;
use App\Models\Products\Order;

class EloquentOrderRepository implements OrderRepository
{
    public function getSortedAndFiltered(array $parameters)
    {
        $filtered = $this->filterBy(Order::query(), $parameters['filters']);
        $sortedAndFiltered = $this->sortBy($filtered, $parameters['orderBy']);

        return $this->search($sortedAndFiltered, $parameters['searchQuery']);
    }

    protected function search($query, $searchQuery)
    {
        return $query->whereHas('user', function ($query) use ($searchQuery) {
          $query->where('email', 'like', "%{$searchQuery}%")
              ->orWhere('name', 'like', "%{$searchQuery}%");
        })->with(['user', 'paymentType', 'product']);
    }

    protected function filterBy($query, array $filterParams)
    {
        $params = array_filter($filterParams, function($value) {
            return !empty($value);
        });

        if ((empty($params))) {
            return $query;
        }

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

    protected function sortBy($query, array $orderByParams) {

        $activeOrderByParams = array_filter($orderByParams, function($value) {
            return $value != 0;
        });

        foreach ($activeOrderByParams as $parameter => $value) {
            switch ($parameter) {
              case 'latest':
                ($value == 1) ? $query->latest()
                    : $query->oldest();
                break;
              case 'largestIds':
                ($value == 1) ? $query->orderBy('id', 'desc')
                    : $query->orderBy('id', 'asc');
                break;
              default:
                $query->latest();
                break;
            }
        }
        return $query;
    }
}
