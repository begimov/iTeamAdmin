<?php

namespace App\Repositories\Eloquent\Pages;

use App\Repositories\EloquentRepositoryAbstract;
use App\Repositories\Contracts\Pages\PageRepository;
use App\Models\Pages\Page;
use App\Models\Pages\Block;
use App\Models\Pages\Element;
use App\Models\Content\File;

class EloquentPageRepository extends EloquentRepositoryAbstract implements PageRepository
{
    public function entity()
    {
        return Page::class;
    }

    public function store(array $data)
    {
        $page = new Page;
        $page->name = $data['name'];
        $page->description = $data['desc'];
        $page->category()->associate($data['category']['id']);
        $page->save();

        $this->storePageElements($data['elements'], $page);

        return $page;
    }

    public function destroyById($id)
    {
        //
    }

    protected function storePageElements($elements, $page)
    {
        foreach ($elements as $key => $element) {
            $block = Block::find($element['meta']['blockId']);

            $e = new Element;

            $e->sort_order = $key;
            $e->data = $element['data'];
            $e->block()->associate($block);
            $e->page()->associate($page);
            $e->save();

            if (isset($element['data']['files'])) {
                $this->associateElementFiles($element['data']['files'], $e);
            }
        }
    }

    protected function associateElementFiles($files, $element)
    {
        foreach ($files as $fileId) {
            $file = File::find($fileId);
            $file->element()->associate($element);
            $file->save();
        }
    }
}
