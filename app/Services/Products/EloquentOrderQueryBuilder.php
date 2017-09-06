<?php

namespace App\Services\Products;

class EloquentOrderQueryBuilder
{
    protected $query;

    public function __construct()
    {
        $this->query = \App\Models\Products\Order::query();
    }

    public function filterBy(array $filterParams)
    {
        if (empty($filterParams)) {
            return $this;
        }

        foreach ($filterParams as $key => $ids) {
            $this->query->whereIn($key, $ids);
        }
        return $this;
    }

    public function sortBy(array $orderByParams) {

        if (empty($orderByParams)) {
            return $this;
        }

        foreach ($orderByParams as $parameter => $value) {
            $this->query->orderBy($parameter, $value);
        }
        
        return $this;
    }

    public function search($searchQuery)
    {
        $this->query->whereHas('user', function ($query) use ($searchQuery) {
          $query->where('email', 'like', "%{$searchQuery}%")
              ->orWhere('name', 'like', "%{$searchQuery}%");
        });

        return $this;
    }

    public function with(array $relations)
    {
        $this->query->with($relations);
        return $this;
    }

    public function build()
    {
        return $this->query;
    }

}
