<?php

namespace App\Repositories\Eloquent\Users;

use App\Repositories\EloquentRepositoryAbstract;
use App\Repositories\Contracts\Users\BusinessEntityRepository;
use App\Models\Users\BusinessEntity;

class EloquentBusinessEntityRepository extends EloquentRepositoryAbstract implements CompanyRepository
{
    public function entity()
    {
        return BusinessEntity::class;
    }
}
