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
dd($filteredOrders->get());
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

    protected function filterBy(array $filterParams)
    {
        $filteredOrders = Order::
            whereIn('payment_type_id', $this->prepareFilterParams($filterParams['paymentType']['values']))
            ->whereIn('payment_state_id', $this->prepareFilterParams($filterParams['paymentState']['values']));
        return $filteredOrders;
    }

    protected function getAllLatest() {
        return Order::latest()->with('user');
    }

    protected function getAllOldest() {
        return Order::oldest()->with('user');
    }

    protected function orderBy($column, $order)
    {
        return Order::orderBy($column, $order)->with('user');
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
