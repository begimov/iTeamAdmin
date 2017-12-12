<?php

namespace App\Repositories\Contracts\Products;

interface ProductRepository
{
    public function store($data);
    public function destroyById($id);
}
