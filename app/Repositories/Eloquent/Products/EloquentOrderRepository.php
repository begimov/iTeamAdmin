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
        $user = User::find($data['email']['id']);
        $product = Product::find($data['product']['id']);
        $order = $this->buildNewOrder($data);

        $order->user()->associate($user);
        $order->product()->associate($product);

        $order->save();

        $this->updateUser($user, $data);
    }

    public function destroyById($id)
    {
        $order = Order::find($id);
        $order->markAsDeleted();
        $order->save();
        $order->delete();
    }

    protected function getFilters()
    {
        return [];
    }

    protected function buildNewOrder($data)
    {
      $order = new Order;

      $order->payment_type_id = isset($data['paymentType'])
          ? $data['paymentType']['id'] : null;

      $order->payment_state_id = $data['paymentState']['id'];

      $order->price = isset($data['orderPrice'])
          ? $data['orderPrice'] : null;

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
    }

    protected function updateUserProfile($profile, $data)
    {
        if (isset($data['phone'])
            && $profile->phone !== $data['phone']['value']) {
            $profile->phone = $data['phone']['value'];
            $profile->save();
        }

        // TODO: When to update company and when to create new one?
        // Maybe with each change in company just to create new one?
        // What will happen when exisitng company selected to connect to another user?
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

    protected function updateUserCompany($company, $data)
    {
        // TODO: Dont replace company name, but create new one and associate it???
        if ($company->name !== $data['company']['value']) {
            $company->name = $data['company']['value'];
        }
        if ($company->business_entity_id !== $data['businessEntity']['id']) {
            $company->business_entity_id = $data['businessEntity']['id'];
        }
        $company->save();
    }

    protected function buildUserCompany($data)
    {
        $businessEntity = BusinessEntity::find($data['businessEntity']['id']);
        $company = new Company;
        $company->name = $data['company']['value'];
        $company->businessEntity()->associate($businessEntity);
        return $company;
    }
}
