<?php

namespace Tests\Feature\Products;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class MaterialPageTest extends TestCase
{
    public function test_unauth_user_cant_access_home_page()
    {
        $response = $this->get(route('materials'));

        $response->assertRedirect('/login');
    }

    public function test_auth_user_without_admin_privileges_cant_access_home_page()
    {
        $user = factory(User::class)->make();

        $response = $this->actingAs($user)->get(route('materials'));

        $response->assertStatus(404);
    }

    public function test_auth_user_with_admin_privileges_can_access_home_page()
    {
        $user = factory(User::class)->create();

        $user->roles()->attach(1);

        $response = $this->actingAs($user)->get(route('materials'));

        $response->assertSuccessful();
    }

    public function test_home_page_view()
    {
        $user = factory(User::class)->create();

        $user->roles()->attach(1);

        $response = $this->actingAs($user)->get(route('materials'));

        $response->assertViewIs('materials.index');
    }
}
