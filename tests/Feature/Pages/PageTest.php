<?php

namespace Tests\Feature\Pages;

use App\User;
use Tests\TestCase;
use App\Models\Pages\Page;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PageTest extends TestCase
{
    public function test_user_cant_update_page_status()
    {
        $user = factory(User::class)->make();

        $page = factory(Page::class)->create();

        $this->actingAs($user)->patch('/webapi/pages/' . $page->id . '/status')
            ->assertStatus(404);
    }

    public function test_admin_can_update_page_status()
    {
        $user = factory(User::class)->create();

        $user->roles()->attach(1);

        $page = factory(Page::class)->create([
            'status' => 1
        ]);

        $this->actingAs($user)->patch('/webapi/pages/' . $page->id . '/status', [
            'status' => 0
        ])->assertSuccessful();

        $this->assertDatabaseHas('pages', [
            'id' => $page->id,
            'status' => 0
        ]);
    }

    public function test_user_cant_access_pages_webapi_index_endpoint()
    {
        $user = factory(User::class)->make();

        $this->actingAs($user)->get('/webapi/pages')
            ->assertStatus(404);
    }

    public function test_admin_can_access_pages_webapi_index_endpoint()
    {
        $user = factory(User::class)->create();

        $user->roles()->attach(1);

        $this->actingAs($user)->get('/webapi/pages')
            ->assertSuccessful()
            ->assertJsonStructure([
                'data' => [['id', 'name', 'status', 'category' => ['data']]]
            ]);
    }

    public function test_user_cant_access_create_endpoint()
    {
        $user = factory(User::class)->make();

        $this->actingAs($user)->get('/webapi/pages/create')
            ->assertStatus(404);
    }

    public function test_admin_can_access_create_endpoint()
    {
        $user = factory(User::class)->create();

        $user->roles()->attach(1);

        $this->actingAs($user)->get('/webapi/pages/create')
            ->assertSuccessful()
            ->assertJsonStructure([
                'blocks', 'categories', 'themes'
            ]);
    }

    public function test_user_cant_store_new_page()
    {
        $user = factory(User::class)->make();

        $this->actingAs($user)->post('/webapi/pages')
            ->assertStatus(404);
    }

    public function test_admin_can_store_new_page()
    {
        $user = factory(User::class)->create();

        $user->roles()->attach(1);

        $this->actingAs($user)->post('/webapi/pages', [
            'name' => $name = uniqid(),
            'description' => 'Description',
            'category_id' => 1,
            'elements' => [
                ['data' => [], 'meta' => ['blockId' => 11]]
            ]
        ])->assertSuccessful();

        $this->assertDatabaseHas('pages', [
            'name' => $name
        ]);
    }

    public function test_name_required_to_store()
    {
        $user = factory(User::class)->create();

        $user->roles()->attach(1);

        $this->actingAs($user)->post('/webapi/pages')
            ->assertSessionHasErrors(['name']);
    }

    public function test_name_required_to_store_must_be_string()
    {
        $user = factory(User::class)->create();

        $user->roles()->attach(1);

        $this->actingAs($user)->post('/webapi/pages', [
            'name' => 1
        ])->assertSessionHasErrors(['name']);
    }

    public function test_description_required_to_store()
    {
        $user = factory(User::class)->create();

        $user->roles()->attach(1);

        $this->actingAs($user)->post('/webapi/pages')
            ->assertSessionHasErrors(['description']);
    }

    public function test_description_required_to_store_must_be_string()
    {
        $user = factory(User::class)->create();

        $user->roles()->attach(1);

        $this->actingAs($user)->post('/webapi/pages', [
            'description' => 1
        ])->assertSessionHasErrors(['description']);
    }

    public function test_category_id_required_to_store()
    {
        $user = factory(User::class)->create();

        $user->roles()->attach(1);

        $this->actingAs($user)->post('/webapi/pages')
            ->assertSessionHasErrors(['category_id']);
    }

    public function test_category_id_required_to_store_must_be_string()
    {
        $user = factory(User::class)->create();

        $user->roles()->attach(1);

        $this->actingAs($user)->post('/webapi/pages', [
            'category_id' => 'a'
        ])->assertSessionHasErrors(['category_id']);
    }

    public function test_existing_category_id_required_to_store()
    {
        $user = factory(User::class)->create();

        $user->roles()->attach(1);

        $this->actingAs($user)->post('/webapi/pages', [
            'category_id' => 11111111111111111
        ])->assertSessionHasErrors(['category_id']);
    }

    public function test_elements_required_to_store()
    {
        $user = factory(User::class)->create();

        $user->roles()->attach(1);

        $this->actingAs($user)->post('/webapi/pages')
            ->assertSessionHasErrors(['elements']);
    }

    public function test_elements_required_to_store_must_be_array()
    {
        $user = factory(User::class)->create();

        $user->roles()->attach(1);

        $this->actingAs($user)->post('/webapi/pages', [
            'elements' => 'a'
        ])->assertSessionHasErrors(['elements']);
    }

    public function test_user_cant_access_edit_endpoint()
    {
        $user = factory(User::class)->make();

        $page = factory(Page::class)->make();

        $this->actingAs($user)->get('/webapi/pages/' . $page->id . '/edit')
            ->assertStatus(404);
    }

    public function test_admin_can_access_edit_endpoint()
    {
        $user = factory(User::class)->create();

        $user->roles()->attach(1);

        $page = factory(Page::class)->create();

        $this->actingAs($user)->get('/webapi/pages/' . $page->id . '/edit')
            ->assertSuccessful()
            ->assertJsonStructure([
                'data' => ['id', 'name', 'description', 'status', 'slug', 'category', 'theme', 'elements']
            ]);
    }

    public function test_user_cant_update_page()
    {
        $user = factory(User::class)->make();

        $page = factory(Page::class)->create();

        $this->actingAs($user)->patch('/webapi/pages/' . $page->id)
            ->assertStatus(404);
    }

    public function test_admin_can_update_page()
    {
        $user = factory(User::class)->create();

        $user->roles()->attach(1);

        $page = factory(Page::class)->create();

        $this->actingAs($user)->patch('/webapi/pages/' . $page->id, [
            'name' => $name = uniqid(),
            'description' => 'Description',
            'category_id' => 1,
            'elements' => [
                ['data' => [], 'meta' => ['blockId' => 11]]
            ]
        ])->assertSuccessful();

        $this->assertDatabaseHas('pages', [
            'id' => $page->id,
            'name' => $name
        ]);
    }
}
