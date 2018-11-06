<?php

namespace Tests\Feature\Home;

use App\User;
use Tests\TestCase;
use App\Models\Auth\Role;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class HomeTest extends TestCase
{
    public function test_unauth_user_cant_access_home_page()
    {
        $response = $this->get('/');

        $response->assertRedirect('/login');
    }

    public function test_auth_user_without_admin_privileges_cant_access_home_page()
    {
        $user = factory(User::class)->make();

        $response = $this->actingAs($user)->get('/');

        $response->assertStatus(404);
    }

    public function test_auth_user_with_admin_privileges_can_access_home_page()
    {
        $user = factory(User::class)->create();

        $user->roles()->attach(1);

        $response = $this->actingAs($user)->get('/');

        $response->assertSuccessful();
    }

    public function test_home_page_view()
    {
        $user = factory(User::class)->create();

        $user->roles()->attach(1);

        $response = $this->actingAs($user)->get('/');

        $response->assertViewIs('home.index');
    }

    public function test_home_page_view_data()
    {
        $user = factory(User::class)->create();

        $user->roles()->attach(1);

        $response = $this->actingAs($user)->get('/');

        $response->assertViewHas(['paymentTypes', 'paymentStates']);
    }
}