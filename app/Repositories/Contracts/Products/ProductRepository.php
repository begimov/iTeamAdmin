<?php

namespace App\Repositories\Contracts\Products;

interface ProductRepository
{
    public function destroyById($id);
}
