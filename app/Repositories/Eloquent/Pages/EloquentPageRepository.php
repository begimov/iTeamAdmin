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

    public function store($request)
    {
        $page = $this->entity->create($request->only($this->getEntityFields()));

        $this->storePageElements($request->elements, $page);

        return $page;
    }

    public function update($request, $id) {
        $page = $this->entity->find($id);

        $page->update($request->only($this->getEntityFields()));

        $this->updatePageElements($request->elements, $page);
    }

    public function updateStatus($data, $id) {
        $page = $this->entity->find($id);

        $page->update($data);
    }

    protected function updatePageElements($elements, $page)
    {
        $page->elements()->delete();

        $this->storePageElements($elements, $page);
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

            $this->storeFiles($element['data'], $e);
        }
    }

    protected function storeFiles($elementData, $newElement)
    {
        if (isset($elementData['files'])) {
            $this->associateElementFiles($elementData['files'], $newElement);
        }
        foreach ($elementData as $e) {
            if (is_array($e)) {
                $this->storeFiles($e, $newElement);
            }
        }
    }

    protected function associateElementFiles($files, $element)
    {
        foreach ($files as $fileId) {
            $file = File::find($fileId);
            if ($file) {
                $file->element()->associate($element);
                $file->save();
            }
            
        }
    }

    protected function getEntityFields()
    {
        return [
            'name', 'description', 'category_id', 'slug', 'theme_id'
        ];
    }
}
