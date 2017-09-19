<?php

namespace App\Repositories\Eloquent\Products;

use App\Repositories\Contracts\Products\OrderRepository;

use App\User;
use App\Models\Products\Order;
use App\Models\Products\Product;
use App\Models\Users\Company;
use App\Models\Users\BusinessEntity;

use App\Services\EloquentQueryBuilder;

class EloquentOrderRepository implements OrderRepository
{
    protected $queryBuilder;

    public function __construct()
    {
        $this->queryBuilder = new EloquentQueryBuilder(Order::class);
    }

    public function sortedAndFilteredOrders(array $parameters, $paginateBy)
    {
        $filterParams = array_filter($parameters['filters'], function($value) {
            return !empty($value);
        });

        $orderByParams = array_filter($parameters['orderBy'], function($value) {
            return $value != '';
        });

        return $this->queryBuilder
            ->filterBy($filterParams)
            ->orderBy($orderByParams)
            ->search($parameters['searchQuery'], 'user', ['email', 'name'])
            ->with(['user', 'paymentType', 'product', 'user.userProfile'])
            ->build()
            ->paginate($paginateBy);
    }

    public function store(array $data)
    {
        $user = User::find($data['email']['id']);
        $product = Product::find($data['product']['id']);
        $order = $this->buildNewOrder($data);

        $order->user()->associate($user);
        $order->product()->associate($product);
        // TODO: UNCOMMENT
        // $order->save();

        $this->updateUser($user, $data);
    }

    public function destroyById($id)
    {
        $order = Order::find($id);
        $order->payment_state_id = 3;
        $order->save();
        $order->delete();
    }

    protected function buildNewOrder($data)
    {
      $order = new Order;

      $order->payment_type_id = isset($data['paymentType'])
          ? $data['paymentType']['id'] : null;
      $order->payment_state_id = $data['paymentState']['id'];
      // TODO: order alternative price
      // $order->price = $data['orderPrice'] ?: null;
      $order->comment = isset($data['comment'])
          ? $data['comment'] : null;

      return $order;
    }

    protected function updateUser($user, $data)
    {
        if ($user->name !== $data['name']['value']) {
            $user->name = $data['name']['value'];
            $user->save();
        }

        $this->updateUserProfile($user->userProfile, $data);

        dd($user);
    }

    protected function updateUserProfile($profile, $data)
    {
        if (isset($data['phone'])
            && $profile->phone !== $data['phone']['value']) {
            $profile->phone = $data['phone']['value'];
            $profile->save();
        }

        if ($profile->company && isset($data['company'])) {
            $this->updateUserCompany($profile->company, $data);
        }

        if (!$profile->company && isset($data['company'])) {
            $company = $this->buildUserCompany($data);
            $company->save();
            $profile->company()->associate($company);
            $profile->save();
        }
    }

    public function updateUserCompany($company, $data)
    {
        if ($company->name !== $data['company']['value']) {
            $company->name = $data['company']['value'];
        }
        if ($company->business_entity_id !== $data['businessEntity']['id']) {
            $company->business_entity_id = $data['businessEntity']['id'];
        }
        $company->save();
    }

    public function buildUserCompany($data)
    {
        $businessEntity = BusinessEntity::find($data['businessEntity']['id']);
        $company = new Company;
        $company->name = $data['company']['value'];
        $company->businessEntity()->associate($businessEntity);
        return $company;
    }
}
