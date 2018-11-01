<?php

namespace Tests\Tests;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TestPageTest extends TestCase
{
    public function test_unauth_user_cant_access_tests_index_page()
    {
        $response = $this->get(route('tests'));

        $response->assertRedirect('/login');
    }

    public function test_auth_user_without_admin_privileges_cant_access_tests_index_page()
    {
        $user = factory(User::class)->make();

        $response = $this->actingAs($user)->get(route('tests'));

        $response->assertStatus(404);
    }

    public function test_auth_user_with_admin_privileges_can_access_tests_index_page()
    {
        $user = factory(User::class)->create();

        $user->roles()->attach(1);

        $response = $this->actingAs($user)->get(route('tests'));

        $response->assertSuccessful();
    }

    public function test_tests_index_page_view()
    {
        $user = factory(User::class)->create();

        $user->roles()->attach(1);

        $response = $this->actingAs($user)->get(route('tests'));

        $response->assertViewIs('tests.index');
    }
}
