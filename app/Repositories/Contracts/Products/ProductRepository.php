<?php

namespace App\Repositories\Contracts\Products;

interface ProductRepository
{
    public function store($request);
    public function update($request, $id);
}
