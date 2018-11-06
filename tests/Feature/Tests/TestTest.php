<?php

namespace Tests\Tests;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TestTest extends TestCase
{
    public function test_user_cant_access_tests_webapi_index_endpoint()
    {
        $user = factory(User::class)->make();

        $this->actingAs($user)->get('/webapi/tests')
            ->assertStatus(404);
    }

    public function test_admin_can_access_tests_webapi_index_endpoint()
    {
        $user = factory(User::class)->create();

        $user->roles()->attach(1);

        $this->actingAs($user)->get('/webapi/tests')
            ->assertSuccessful()
            ->assertJsonStructure([
                'data' => [['id', 'name', 'description']]
            ]);
    }

    public function test_user_cant_access_create_endpoint()
    {
        $user = factory(User::class)->make();

        $this->actingAs($user)->get('/webapi/tests/create')
            ->assertStatus(404);
    }

    public function test_admin_can_access_create_endpoint()
    {
        $user = factory(User::class)->create();

        $user->roles()->attach(1);

        $this->actingAs($user)->get('/webapi/tests/create')
            ->assertSuccessful()
            ->assertJsonStructure([
                'types'
            ]);
    }

    public function test_user_cant_store_new_test()
    {
        $user = factory(User::class)->make();

        $this->actingAs($user)->post('/webapi/tests')
            ->assertStatus(404);
    }

    public function test_admin_can_store_new_test()
    {
        $user = factory(User::class)->create();

        $user->roles()->attach(1);

        $this->actingAs($user)->post('/webapi/tests', [
            'name' => $name = uniqid(),
            'certificate' => null,
            'conditions' => [],
            'description' => "...",
            'questions' => [],
            'test_type_id' => 1
        ])->assertSuccessful();

        $this->assertDatabaseHas('tests', [
            'name' => $name
        ]);
    }

    public function test_name_required_to_store()
    {
        $user = factory(User::class)->create();

        $user->roles()->attach(1);

        $this->actingAs($user)->post('/webapi/tests')
            ->assertSessionHasErrors(['name']);
    }

    public function test_name_required_to_store_must_be_string()
    {
        $user = factory(User::class)->create();

        $user->roles()->attach(1);

        $this->actingAs($user)->post('/webapi/tests', [
            'name' => 1
        ])->assertSessionHasErrors(['name']);
    }

    public function test_test_type_id_required_to_store()
    {
        $user = factory(User::class)->create();

        $user->roles()->attach(1);

        $this->actingAs($user)->post('/webapi/tests')
            ->assertSessionHasErrors(['test_type_id']);
    }

    public function test_test_type_id_required_to_store_must_exists()
    {
        $user = factory(User::class)->create();

        $user->roles()->attach(1);

        $this->actingAs($user)->post('/webapi/tests', [
            'test_type_id' => 1111111111
        ])->assertSessionHasErrors(['test_type_id']);
    }
}
