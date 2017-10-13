<?php

namespace App\Repositories\Contracts\Products;

interface ProductRepository
{
    public function filter($request);
    public function destroyById($id);
}
