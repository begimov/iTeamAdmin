<?php

namespace App\Repositories\Eloquent\Products;

use App\Repositories\EloquentRepositoryAbstract;
use App\Repositories\Contracts\Products\ProductRepository;

use App\Models\Products\Product;
use App\Models\Products\Category;
use App\Models\Products\PriceTag;

class EloquentProductRepository extends EloquentRepositoryAbstract implements ProductRepository
{
    public function entity()
    {
        return Product::class;
    }

    public function store($request)
    {
        $product = $this->entity->create($request->only($this->getEntityFields()));

        $this->storeMaterialRelations($request->materials, $product);

        if ($request->priceTags) {
            $this->storePriceTags($request->priceTags, $product->id);
        } 
    }

    public function update($request, $id)
    {
        $product = $this->entity->find($id);

        $product->update($request->only($this->getEntityFields()));
    }

    protected function storeMaterialRelations(array $materials, Product $product)
    {
        foreach ($materials as $material) {
            $product->materials()->attach($material['id']);
        }
    }

    protected function storePriceTags(array $priceTags, $product_id)
    {
        foreach ($priceTags as $priceTag) {
            PriceTag::create(array_merge($priceTag, [
                'product_id' => $product_id
            ]));
        }
    }

    protected function getEntityFields()
    {
        return [
            'name', 'price', 'category_id'
        ];
    }
}
