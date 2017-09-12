<?php

namespace App\Repositories\Eloquent\Users;

use App\Repositories\Contracts\Users\CompanyRepository;
use App\Models\Users\Company;

class EloquentCompanyRepository implements CompanyRepository
{
    public function whereLike($column, $query)
    {
        return Company::where($column, 'like', "%{$query}%")->take(3)->get();
    }
}
