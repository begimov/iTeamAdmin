<?php

namespace App\Repositories\Contracts\Products;

interface OrderRepository
{
    public function store(array $data);
    public function destroyById($id);
}
