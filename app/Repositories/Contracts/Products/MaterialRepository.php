<?php

namespace App\Repositories\Contracts\Products;

interface MaterialRepository
{
    public function create();
    public function store(array $data);
}
