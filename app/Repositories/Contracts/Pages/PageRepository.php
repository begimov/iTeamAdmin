<?php

namespace App\Repositories\Contracts\Pages;

interface PageRepository
{
  public function sortedAndFilteredOrders(array $parameters, $paginateBy);

  public function destroyById($id);
}
