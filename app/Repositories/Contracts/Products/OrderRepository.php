<?php

namespace App\Repositories\Contracts\Products;

interface OrderRepository
{
    public function orderAndFilterQuery(array $parameters);
}
