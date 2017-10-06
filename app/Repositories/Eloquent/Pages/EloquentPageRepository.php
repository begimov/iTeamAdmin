<?php

namespace App\Repositories\Eloquent\Pages;

use App\Repositories\Contracts\Pages\PageRepository;
use App\Models\Pages\Page;

use App\Services\EloquentQueryBuilder;

class EloquentPageRepository implements PageRepository
{
    protected $queryBuilder;

    public function __construct()
    {
        $this->queryBuilder = new EloquentQueryBuilder(Page::class);
    }

    public function sortedAndFilteredOrders(array $parameters, $paginateBy)
    {
        // TODO: CLEAN UP
        // $filterParams = array_filter($parameters['filters'], function($value) {
        //     return !empty($value);
        // });
        //
        // $orderByParams = array_filter($parameters['orderBy'], function($value) {
        //     return $value != '';
        // });
        //
        return $this->queryBuilder
            ->search($parameters['searchQuery'], null, ['name'])
            // ->with(['category','priceTags'])
            ->build()
            ->paginate($paginateBy);
        // return $this->queryBuilder
        //     ->filterBy($filterParams)
        //     ->orderBy($orderByParams)
        //     ->search($parameters['searchQuery'], 'user', ['email', 'name'])
        //     ->with(['user', 'paymentType', 'product', 'user.userProfile'])
        //     ->withTrashed()
        //     ->build()
        //     ->paginate($paginateBy);
    }

    public function destroyById($id)
    {
        //
    }
}
