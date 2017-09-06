<?php

namespace App\Repositories\Contracts\Products;

interface OrderRepository
{
    public function sortedAndFilteredOrders(array $parameters, $paginateBy);
}
