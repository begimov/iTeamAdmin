<?php

namespace App\Repositories\Eloquent\Products;

use App\Repositories\EloquentRepositoryAbstract;
use App\Repositories\Contracts\Products\MaterialRepository;

use App\Models\Products\Material;

class EloquentMaterialRepository extends EloquentRepositoryAbstract implements MaterialRepository
{
    public function entity()
    {
        return Material::class;
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

        if (isset($data['videos']) && !empty($data['videos'])) {
            // $this->storeVideoIds;
        }

        $material->save();
    }
}
