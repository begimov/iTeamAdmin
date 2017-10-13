<?php

namespace App\Repositories\Contracts\Pages;

interface PageRepository
{
  public function filter($request);
  public function destroyById($id);
}
