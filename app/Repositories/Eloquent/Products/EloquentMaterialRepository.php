<?php

namespace App\Repositories\Eloquent\Products;

use App\Repositories\EloquentRepositoryAbstract;
use App\Repositories\Contracts\Products\MaterialRepository;

use App\Models\Products\Material;
use App\Models\Content\Resource;
use App\Models\Content\ResourceType;

class EloquentMaterialRepository extends EloquentRepositoryAbstract implements MaterialRepository
{
    public function entity()
    {
        return Material::class;
    }

    public function paginate($by)
    {
        return $this->entity->whereNotNull('name')->paginate($by);
    }

    public function get()
    {
        return $this->entity->whereNotNull('name')->get();
    }

    public function create()
    {
        $material = new Material;
        $material->save();
        return $material;
    }

    public function store(array $data)
    {
        $material = Material::find($data['id']);
        $material->name = $data['name'];
        $material->save();

        if ($this->hasVideoResources($data)) {
            $this->storeVideoResources($data['videos'], $material);
        }
    }

    public function update($request, $id)
    {
        $material = $this->entity->find($id);

        $material->update($request->only($this->getEntityFields()));

        $material->resources()->delete();

        if ($this->hasVideoResources($data = $request->all())) {         
            $this->storeVideoResources($data['videos'], $material);
        }
    }

    protected function storeVideoResources($videos, $material)
    {
        foreach ($videos as $video) {
            $resource = new Resource;

            $resource->identifier = $video['identifier'];

            $resource->resourceType()
                ->associate(ResourceType::find(config('resources.youtubevideo_type_id')));

            $material->resources()->save($resource);
        }
    }

    protected function hasVideoResources($data)
    {
        return isset($data['videos']) && !empty($data['videos']);
    }

    protected function getEntityFields()
    {
        return [
            'name'
        ];
    }
}
