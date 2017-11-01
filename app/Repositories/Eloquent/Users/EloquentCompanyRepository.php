<?php

namespace App\Repositories\Eloquent\Users;

use App\Repositories\EloquentRepositoryAbstract;
use App\Repositories\Contracts\Users\CompanyRepository;
use App\Models\Users\Company;

class EloquentCompanyRepository extends EloquentRepositoryAbstract implements CompanyRepository
{
    public function entity()
    {
        return Company::class;
    }
}
