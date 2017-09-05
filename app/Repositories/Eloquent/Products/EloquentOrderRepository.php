<?php

namespace App\Repositories\Eloquent\Products;

use App\Repositories\Contracts\Products\OrderRepository;
use App\Models\Products\Order;

class EloquentOrderRepository implements OrderRepository
{
    public function getSortedAndFiltered(array $parameters)
    {
        $sortParams = array_filter($parameters['orderBy'], function($value) {
            return $value != 0;
        });
// dd($filterParams);
        $filteredOrders = $this->filterBy($parameters['filters']);
// dd($filteredOrders->get());
        return (empty($sortParams)) ? $this->getAllLatest($filteredOrders)
            : $this->sortBy($filteredOrders, $sortParams);
    }

    protected function sortBy($filteredOrders, array $sortParams) {

        foreach ($sortParams as $parameter => $value) {

            switch ($parameter) {
              case 'latest':
                return ($value == 1) ? $this->getAllLatest($filteredOrders)
                    : $this->getAllOldest($filteredOrders);
                break;
              case 'largestIds':
                return ($value == 1) ? $this->orderBy($filteredOrders, 'id', 'desc')
                    : $this->orderBy($filteredOrders, 'id', 'asc');
                break;
              default:
                return $this->getAllLatest($filteredOrders);
                break;
            }
        }
    }

    protected function filterBy(array $filterParams)
    {
        $filteredOrders = Order::
            whereIn('payment_type_id', $this->prepareFilterParams($filterParams['paymentType']['values']))
            ->whereIn('payment_state_id', $this->prepareFilterParams($filterParams['paymentState']['values']));
        return $filteredOrders;
    }

    protected function getAllLatest($filteredOrders) {
        return $filteredOrders->latest()->with('user');
    }

    protected function getAllOldest($filteredOrders) {
        return $filteredOrders->oldest()->with('user');
    }

    protected function orderBy($filteredOrders, $column, $order)
    {
        return $filteredOrders->orderBy($column, $order)->with('user');
    }

    protected function prepareFilterParams(array $params)
    {
        $filterParams = [];
        foreach ($params as $parameter => $value) {
            $filterParams[] = $value['id'];
        }
        return $filterParams;
    }
}
