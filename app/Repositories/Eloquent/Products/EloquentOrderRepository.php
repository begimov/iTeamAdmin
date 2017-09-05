<?php

namespace App\Repositories\Eloquent\Products;

use App\Repositories\Contracts\Products\OrderRepository;
use App\Models\Products\Order;

class EloquentOrderRepository implements OrderRepository
{
    public function getSortedAndFiltered(array $parameters)
    {
        $orderByParams = $parameters['orderBy'];
        $filterParams = $parameters['filters'];

        $filteredOrders = $this->filterBy($filterParams);
        $resultOrders = $this->sortBy($filteredOrders, $orderByParams);

        return $resultOrders;
    }

    protected function sortBy($filteredOrders, array $orderByParams) {

        $orderByActiveParam = array_filter($orderByParams, function($value) {
            return $value != 0;
        });

        if ((empty($orderByActiveParam))) {
            return $this->getAllLatest($filteredOrders);
        }

        foreach ($orderByActiveParam as $parameter => $value) {

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

    protected function filterBy(array $filterParams)
    {
        $filteredOrders = Order::
            whereIn('payment_type_id', $this->prepareFilterParams($filterParams['paymentType']['values']))
            ->whereIn('payment_state_id', $this->prepareFilterParams($filterParams['paymentState']['values']));
        return $filteredOrders;
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
