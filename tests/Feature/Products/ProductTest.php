<?php

namespace Tests\Feature\Products;

use App\User;
use Tests\TestCase;
use App\Models\Products\Product;
use App\Models\Products\Material;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProductTest extends TestCase
{
    public function test_user_cant_get_all_products()
    {
        $user = factory(User::class)->make();

        $this->actingAs($user)->get('/webapi/products/all')
            ->assertStatus(404);
    }

    public function test_admin_can_get_all_products()
    {
        $user = factory(User::class)->create();

        $user->roles()->attach(1);

        $this->actingAs($user)->get('/webapi/products/all')
            ->assertSuccessful()
            ->assertJsonStructure([
                'data' => [['id', 'name', 'price', 'priceTags']]
            ]);
    }

    public function test_user_cant_get_free_products()
    {
        $user = factory(User::class)->make();

        $this->actingAs($user)->get('/webapi/products/free')
            ->assertStatus(404);
    }

    public function test_admin_can_get_free_products()
    {
        $user = factory(User::class)->create();

        $user->roles()->attach(1);

        $response = $this->actingAs($user)->get('/webapi/products/free')
            ->assertSuccessful()
            ->assertJsonStructure([
                'data' => [['id', 'name', 'price']]
            ])
            ->decodeResponseJson();

        $this->assertTrue(collect($response['data'])->sum('price') == 0);
    }

    public function test_user_cant_access_products_webapi_index_endpoint()
    {
        $user = factory(User::class)->make();

        $this->actingAs($user)->get('/webapi/products')
            ->assertStatus(404);
    }

    public function test_admin_can_access_products_webapi_index_endpoint()
    {
        $user = factory(User::class)->create();

        $user->roles()->attach(1);

        $this->actingAs($user)->get('/webapi/products')
            ->assertSuccessful()
            ->assertJsonStructure([
                'data' => [['id', 'name', 'price', 'priceTags', 'category']]
            ]);
    }

    public function test_user_cant_access_create_endpoint()
    {
        $user = factory(User::class)->make();

        $this->actingAs($user)->get('/webapi/products/create')
            ->assertStatus(404);
    }

    public function test_admin_can_access_create_endpoint()
    {
        $user = factory(User::class)->create();

        $user->roles()->attach(1);

        $this->actingAs($user)->get('/webapi/products/create')
            ->assertSuccessful()
            ->assertJsonStructure([
                'categories', 'materials', 'tests'
            ]);
    }

    public function test_user_cant_store_new_product()
    {
        $user = factory(User::class)->make();

        $this->actingAs($user)->post('/webapi/products')
            ->assertStatus(404);
    }

    public function test_admin_can_store_new_product()
    {
        $user = factory(User::class)->create();

        $user->roles()->attach(1);

        $material = factory(Material::class)->create();

        $this->actingAs($user)->post('/webapi/products', [
            'name' => $name = uniqid(),
            'category_id' => 1,
            'price' => 1,
            'materials' => [
                ['id' => $material->id]
            ],
            'priceTags' => [],
            'tests' => []
        ])->assertSuccessful();

        $this->assertDatabaseHas('products', [
            'name' => $name
        ]);
    }

    public function test_storing_new_product_require_name()
    {
        $user = factory(User::class)->create();

        $user->roles()->attach(1);

        $this->actingAs($user)->post('/webapi/products')->assertSessionHasErrors(['name']);
    }

    public function test_storing_new_product_require_name_to_be_string()
    {
        $user = factory(User::class)->create();

        $user->roles()->attach(1);

        $this->actingAs($user)->post('/webapi/products', [
            'name' => 1
        ])->assertSessionHasErrors(['name']);
    }

    public function test_storing_new_product_require_category_id()
    {
        $user = factory(User::class)->create();

        $user->roles()->attach(1);

        $this->actingAs($user)->post('/webapi/products')->assertSessionHasErrors(['category_id']);
    }

    public function test_storing_new_product_require_numeric_category_id()
    {
        $user = factory(User::class)->create();

        $user->roles()->attach(1);

        $this->actingAs($user)->post('/webapi/products', [
            'category_id' => 'a'
        ])->assertSessionHasErrors(['category_id']);
    }

    public function test_storing_new_product_require_existing_category_id()
    {
        $user = factory(User::class)->create();

        $user->roles()->attach(1);

        $this->actingAs($user)->post('/webapi/products', [
            'category_id' => 11111111111111111
        ])->assertSessionHasErrors(['category_id']);
    }

    public function test_storing_new_product_require_price()
    {
        $user = factory(User::class)->create();

        $user->roles()->attach(1);

        $this->actingAs($user)->post('/webapi/products')->assertSessionHasErrors(['price']);
    }

    public function test_storing_new_product_require_numeric_price()
    {
        $user = factory(User::class)->create();

        $user->roles()->attach(1);

        $this->actingAs($user)->post('/webapi/products', [
            'price' => 'a'
        ])->assertSessionHasErrors(['price']);
    }

    public function test_storing_new_product_require_materials()
    {
        $user = factory(User::class)->create();

        $user->roles()->attach(1);

        $this->actingAs($user)->post('/webapi/products')->assertSessionHasErrors(['materials']);
    }

    public function test_storing_new_product_require_array_of_materials()
    {
        $user = factory(User::class)->create();

        $user->roles()->attach(1);

        $this->actingAs($user)->post('/webapi/products', [
            'materials' => 'a'
        ])->assertSessionHasErrors(['materials']);
    }

    public function test_storing_new_product_priceTags_must_be_array()
    {
        $user = factory(User::class)->create();

        $user->roles()->attach(1);

        $this->actingAs($user)->post('/webapi/products', [
            'priceTags' => 'a'
        ])->assertSessionHasErrors(['priceTags']);
    }

    public function test_storing_new_product_priceTags_must_be_array_with_numeric_prices()
    {
        $user = factory(User::class)->create();

        $user->roles()->attach(1);

        $this->actingAs($user)->post('/webapi/products', [
            'priceTags' => [['price' => 'a']]
        ])->assertSessionHasErrors(['priceTags.0.price']);
    }

    public function test_storing_new_product_tests_must_be_array()
    {
        $user = factory(User::class)->create();

        $user->roles()->attach(1);

        $this->actingAs($user)->post('/webapi/products', [
            'tests' => 'a'
        ])->assertSessionHasErrors(['tests']);
    }

    public function test_user_cant_access_edit_endpoint()
    {
        $user = factory(User::class)->make();

        $product = factory(Product::class)->make();

        $this->actingAs($user)->get('/webapi/products/' . $product->id . '/edit')
            ->assertStatus(404);
    }

    public function test_admin_can_access_edit_endpoint()
    {
        $user = factory(User::class)->create();

        $user->roles()->attach(1);

        $product = factory(Product::class)->create();

        $this->actingAs($user)->get('/webapi/products/' . $product->id . '/edit')
            ->assertSuccessful()
            ->assertJsonStructure([
                'data' => ['id', 'name', 'price', 'category', 'priceTags', 'materials', 'tests']
            ]);
    }

    public function test_user_cant_update_product()
    {
        $user = factory(User::class)->make();

        $product = factory(Product::class)->create();

        $this->actingAs($user)->patch('/webapi/products/' . $product->id)
            ->assertStatus(404);
    }

    public function test_admin_can_update_product()
    {
        $user = factory(User::class)->create();

        $user->roles()->attach(1);

        $product = factory(Product::class)->create();

        $material = factory(Material::class)->create();

        $this->actingAs($user)->patch('/webapi/products/' . $product->id, [
            'name' => $name = uniqid(),
            'category_id' => 1,
            'price' => 1,
            'materials' => [
                ['id' => $material->id]
            ],
            'priceTags' => [],
            'tests' => []
        ])->assertSuccessful();

        $this->assertDatabaseHas('products', [
            'name' => $name
        ]);
    }
}
