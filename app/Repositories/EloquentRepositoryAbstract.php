<?php

namespace App\Repositories;

use App\Repositories\Exceptions\NoEntityDefined;
use App\Repositories\RepositoryInterface;
use App\Repositories\Criteria\CriteriaInterface;

abstract class EloquentRepositoryAbstract implements RepositoryInterface, CriteriaInterface
{
    protected $entity;

    public function __construct()
    {
        $this->entity = $this->resolveEntity();
    }

    public function get()
    {
        return $this->entity->get();
    }

    public function paginate($by)
    {
        return $this->entity->paginate($by);
    }

    public function highestIdsFirst()
    {
        $this->entity = $this->entity->orderBy('id', 'desc');
        return $this;
    }

    public function withTrashed()
    {
        $this->entity = $this->entity->withTrashed();
        return $this;
    }

    public function filter($request)
    {
        return $this->entity->filter($this, $request, $this->getFilters());
    }

    public function findById($id)
    {
        return $this->entity->find($id);
    }

    public function withCriteria(array $criteria)
    {
        foreach ($criteria as $criterion) {
            $this->entity = $criterion->apply($this->entity);
        }
        return $this;
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
