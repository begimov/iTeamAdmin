<?php

namespace App\Repositories\Eloquent\Products;

use App\Repositories\EloquentRepositoryAbstract;
use App\Repositories\Contracts\Products\OrderRepository;

use App\User;
use App\Models\Products\Order;
use App\Models\Products\Product;
use App\Models\Users\Company;
use App\Models\Users\BusinessEntity;

use App\Filters\Products\Order\PaymentTypeFilter;

class EloquentOrderRepository extends EloquentRepositoryAbstract implements OrderRepository
{
    public function entity()
    {
        return Order::class;
    }

    public function store(array $data)
    {
        return $this->entity->create($data);
    }

    public function destroyById($id)
    {
        $order = Order::find($id);
        $order->markAsDeleted();
        $order->save();
        $order->delete();
    }

    public function update(array $data, $id)
    {
        $order = $this->entity->withTrashed()->find($id);
        $order->update($data);
    }

}
