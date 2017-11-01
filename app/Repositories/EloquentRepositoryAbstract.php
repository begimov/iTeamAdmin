<?php

namespace App\Repositories;

use App\Repositories\Exceptions\NoEntityDefined;
use App\Repositories\Contracts\RepositoryInterface;

abstract class EloquentRepositoryAbstract implements RepositoryInterface
{
    protected $entity;

    public function __construct()
    {
        $this->entity = $this->resolveEntity();
    }

    public function filter($request)
    {
        return $this->entity->filter($request, $this->getFilters());
    }

    public function whereLike($column, $query, $limit)
    {
        return $this->entity->where($column, 'like', "%{$query}%")->take($limit)->get();
    }

    protected function resolveEntity()
    {
        if (!method_exists($this, 'entity')) {
            throw new NoEntityDefined();
        }
        return app()->make($this->entity());
    }

    protected function getFilters()
    {
        return [];
    }
}
