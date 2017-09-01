<?php

namespace App\Repositories\Contracts\Products;

interface OrderRepository
{
    public function getSortedAndFiltered(array $parameters);
}
