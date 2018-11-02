<?php

namespace Tests\Feature\Products;

use App\User;
use Tests\TestCase;
use App\Models\Products\Material;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class MaterialTest extends TestCase
{
    public function test_user_cant_access_materials_webapi_index_endpoint()
    {
        $user = factory(User::class)->make();

        $this->actingAs($user)->get('/webapi/materials')
            ->assertStatus(404);
    }

    public function test_admin_can_access_materials_webapi_index_endpoint()
    {
        $user = factory(User::class)->create();

        $user->roles()->attach(1);

        $this->actingAs($user)->get('/webapi/materials')
            ->assertSuccessful()
            ->assertJsonStructure([
                'data' => [['id', 'name', 'accessUrl', 'products' => ['data']]]
            ]);
    }

    public function test_user_cant_access_create_endpoint()
    {
        $user = factory(User::class)->make();

        $this->actingAs($user)->get('/webapi/materials/create')
            ->assertStatus(404);
    }

    public function test_admin_can_access_create_endpoint()
    {
        $user = factory(User::class)->create();

        $user->roles()->attach(1);

        $this->actingAs($user)->get('/webapi/materials/create')
            ->assertSuccessful()
            ->assertJsonStructure([
                'material'
            ]);
    }

    public function test_user_cant_store_new_material()
    {
        $user = factory(User::class)->make();

        $this->actingAs($user)->post('/webapi/materials')
            ->assertStatus(404);
    }

    public function test_admin_can_store_new_product()
    {
        $user = factory(User::class)->create();

        $user->roles()->attach(1);

        $material = factory(Material::class)->create();

        $this->actingAs($user)->post('/webapi/materials', [
            'id' => $material->id,
            'name' => $name = uniqid()
        ])->assertSuccessful();

        $this->assertDatabaseHas('materials', [
            'name' => $name
        ]);
    }

    public function test_id_required_to_store()
    {
        $user = factory(User::class)->create();

        $user->roles()->attach(1);

        $this->actingAs($user)->post('/webapi/materials')
            ->assertSessionHasErrors(['id']);
    }

    public function test_id_required_to_store_must_be_numeric()
    {
        $user = factory(User::class)->create();

        $user->roles()->attach(1);

        $this->actingAs($user)->post('/webapi/materials', [
            'id' => 'id'
        ])->assertSessionHasErrors(['id']);
    }

    public function test_existing_id_required_to_store()
    {
        $user = factory(User::class)->create();

        $user->roles()->attach(1);

        $this->actingAs($user)->post('/webapi/materials', [
            'id' => 11111111111111111
        ])->assertSessionHasErrors(['id']);
    }

    public function test_name_required_to_store()
    {
        $user = factory(User::class)->create();

        $user->roles()->attach(1);

        $this->actingAs($user)->post('/webapi/materials')
            ->assertSessionHasErrors(['name']);
    }

    public function test_name_required_to_store_must_be_string()
    {
        $user = factory(User::class)->create();

        $user->roles()->attach(1);

        $this->actingAs($user)->post('/webapi/materials', [
            'name' => 1
        ])->assertSessionHasErrors(['name']);
    }

    public function test_admin_can_store_new_material_resources()
    {
        $user = factory(User::class)->create();

        $user->roles()->attach(1);

        $material = factory(Material::class)->create();

        $this->actingAs($user)->post('/webapi/materials', [
            'id' => $material->id,
            'name' => $material->name,
            'videos' => [
                ['identifier' => $identifier = uniqid()]
            ]
        ])->assertSuccessful();

        $this->assertDatabaseHas('resources', [
            'identifier' => $identifier,
            'resource_type_id' => 1,
            'resourceable_id' => $material->id,
            'resourceable_type' =>'materials'
        ]);
    }

    public function test_user_cant_access_edit_endpoint()
    {
        $user = factory(User::class)->make();

        $material = factory(Material::class)->make();

        $this->actingAs($user)->get('/webapi/materials/' . $material->id . '/edit')
            ->assertStatus(404);
    }

    public function test_admin_can_access_edit_endpoint()
    {
        $user = factory(User::class)->create();

        $user->roles()->attach(1);

        $material = factory(Material::class)->create();

        $this->actingAs($user)->get('/webapi/materials/' . $material->id . '/edit')
            ->assertSuccessful()
            ->assertJsonStructure([
                'data' => ['id', 'name', 'accessUrl', 'files', 'resources']
            ]);
    }

    public function test_user_cant_update_product()
    {
        $user = factory(User::class)->make();

        $material = factory(Material::class)->create();

        $this->actingAs($user)->patch('/webapi/materials/' . $material->id)
            ->assertStatus(404);
    }

    public function test_admin_can_update_product()
    {
        $user = factory(User::class)->create();

        $user->roles()->attach(1);

        $material = factory(Material::class)->create();

        $this->actingAs($user)->patch('/webapi/materials/' . $material->id, [
            'id' => $material->id,
            'name' => $name = uniqid()
        ])->assertSuccessful();

        $this->assertDatabaseHas('materials', [
            'id' => $material->id,
            'name' => $name
        ]);
    }
}
