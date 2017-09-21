<?php

namespace App\Repositories\Contracts\Products;

interface ProductRepository
{
    public function sortedAndFilteredOrders(array $parameters, $paginateBy);
}
