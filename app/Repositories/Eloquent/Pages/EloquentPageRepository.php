<?php

namespace App\Repositories\Eloquent\Pages;

use App\Repositories\Contracts\Pages\PageRepository;
use App\Models\Pages\Page;

class EloquentPageRepository implements PageRepository
{
    public function filter($request)
    {
        return Page::filter($request, $this->getFilters());
    }

    public function destroyById($id)
    {
        //
    }
    protected function getFilters()
    {
        return [];
    }
}
