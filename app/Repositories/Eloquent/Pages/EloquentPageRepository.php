<?php

namespace App\Repositories\Eloquent\Pages;

use App\Repositories\EloquentRepositoryAbstract;
use App\Repositories\Contracts\Pages\PageRepository;
use App\Models\Pages\Page;

class EloquentPageRepository extends EloquentRepositoryAbstract implements PageRepository
{
    public function entity()
    {
        return Page::class;
    }

    public function store(array $elements)
    {
        //
    }

    public function destroyById($id)
    {
        //
    }
}
