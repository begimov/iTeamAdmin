<?php

namespace App\Repositories\Contracts\Products;

interface OrderRepository
{
    public function getSortedAndFiltered(array $parameters);
    public function getAllLatest();
    public function sortBy(array $sortParams);
}
