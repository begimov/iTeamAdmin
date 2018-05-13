<?php

namespace App\Repositories\Contracts\Pages;

interface PageRepository
{
  public function store($request);
  public function destroyById($id);
}
