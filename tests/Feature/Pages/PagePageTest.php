<?php

namespace Tests\Feature\Pages;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PagePageTest extends TestCase
{
    public function test_unauth_user_cant_access_pages_index_page()
    {
        $response = $this->get(route('pages'));

        $response->assertRedirect('/login');
    }

    public function test_auth_user_without_admin_privileges_cant_access_pages_index_page()
    {
        $user = factory(User::class)->make();

        $response = $this->actingAs($user)->get(route('pages'));

        $response->assertStatus(404);
    }

    public function test_auth_user_with_admin_privileges_can_access_pages_index_page()
    {
        $user = factory(User::class)->create();

        $user->roles()->attach(1);

        $response = $this->actingAs($user)->get(route('pages'));

        $response->assertSuccessful();
    }

    public function test_pages_index_page_view()
    {
        $user = factory(User::class)->create();

        $user->roles()->attach(1);

        $response = $this->actingAs($user)->get(route('pages'));

        $response->assertViewIs('pages.index');
    }

    public function test_pages_index_page_view_data()
    {
        $user = factory(User::class)->create();

        $user->roles()->attach(1);

        $response = $this->actingAs($user)->get(route('pages'));

        $response->assertViewHas(['categories', 'themes']);
    }
}
