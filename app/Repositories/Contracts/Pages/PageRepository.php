<?php

namespace App\Repositories\Contracts\Pages;

interface PageRepository
{
  public function store(array $elements);
  public function destroyById($id);
}
