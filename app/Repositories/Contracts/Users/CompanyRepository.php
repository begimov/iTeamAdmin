<?php

namespace App\Repositories\Contracts\Users;

interface CompanyRepository
{
    public function whereLike($column, $query);
}
