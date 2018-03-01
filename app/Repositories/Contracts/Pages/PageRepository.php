<?php

namespace App\Repositories\Contracts\Pages;

interface PageRepository
{
  public function store(array $data);
  public function destroyById($id);
}
