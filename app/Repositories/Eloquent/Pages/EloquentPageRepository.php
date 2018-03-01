<?php

namespace App\Repositories\Eloquent\Pages;

use App\Repositories\EloquentRepositoryAbstract;
use App\Repositories\Contracts\Pages\PageRepository;
use App\Models\Pages\Page;
use App\Models\Pages\Element;

class EloquentPageRepository extends EloquentRepositoryAbstract implements PageRepository
{
    public function entity()
    {
        return Page::class;
    }

    public function store(array $data)
    {
        $page = new Page;
        $page->name = $data['data']['name'];
        $page->save();
        // foreach ($elements as $element) {
        //     $block = Block::find($element['meta']['blockId']);

        //     $e = new Element;

        //     $e->data = $element->data;
        //     $block->element->associate($e);
        // }
    }

    public function destroyById($id)
    {
        //
    }
}
