<?php

namespace App\Repositories\Contracts\Products;

interface OrderRepository
{
    public function getAll();
    public function getAllLatestPaginateBy($number);
}
