<?php

namespace reviews\Feature\Reviews;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ReviewPageTest extends TestCase
{
    public function test_unauth_user_cant_access_reviews_index_page()
    {
        $response = $this->get(route('reviews'));

        $response->assertRedirect('/login');
    }

    public function test_auth_user_without_admin_privileges_cant_access_reviews_index_page()
    {
        $user = factory(User::class)->make();

        $response = $this->actingAs($user)->get(route('reviews'));

        $response->assertStatus(404);
    }

    public function test_auth_user_with_admin_privileges_can_access_reviews_index_page()
    {
        $user = factory(User::class)->create();

        $user->roles()->attach(1);

        $response = $this->actingAs($user)->get(route('reviews'));

        $response->assertSuccessful();
    }

    public function test_reviews_index_page_view()
    {
        $user = factory(User::class)->create();

        $user->roles()->attach(1);

        $response = $this->actingAs($user)->get(route('reviews'));

        $response->assertViewIs('reviews.index');
    }
}
