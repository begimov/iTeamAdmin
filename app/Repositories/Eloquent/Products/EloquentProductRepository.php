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

        $this->storeTestRelations($request->tests, $product);

        $this->storePriceTags($request->priceTags, $product->id);
    }

    public function update($request, $id)
    {
        $product = $this->entity->find($id);

        $product->update($request->only($this->getEntityFields()));

        $this->updateMaterialRelations($request->materials, $product);

        $this->updatePriceTags($request->priceTags, $product);
    }

    protected function storeMaterialRelations(array $materials, Product $product)
    {
        foreach ($materials as $material) {
            $product->materials()->attach($material['id']);
        }
    }

    protected function storeTestRelations(array $tests, Product $product)
    {
        foreach ($tests as $test) {
            $product->tests()->attach($test['id']);
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

    protected function updateMaterialRelations(array $materials, Product $product)
    {
        $product->materials()->detach();

        $this->storeMaterialRelations($materials, $product);
    }

    protected function updatePriceTags(array $priceTags, Product $product)
    {
        list($withId, $withoutId) = collect($priceTags)->partition(function ($pt) {
            return !empty($pt['id']);
        });

        $priceTagsIds = $withId->map(function ($pt) {
            return $pt['id'];
        })->all();

        $product->priceTags()->whereNotIn('id', $priceTagsIds)->delete();

        $this->storePriceTags($withoutId->all(), $product->id);
    }

    protected function getEntityFields()
    {
        return [
            'name', 'price', 'category_id'
        ];
    }
}
