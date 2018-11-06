<?php

namespace Tests\Feature\Reviews;

use App\User;
use Tests\TestCase;
use App\Models\Reviews\Review;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ReviewTest extends TestCase
{
    protected $basePath = '/webapi/reviews';

    public function test_user_cant_access_reviews_webapi_index_endpoint()
    {
        $user = factory(User::class)->make();

        $this->actingAs($user)->get($this->basePath)
            ->assertStatus(404);
    }

    public function test_admin_can_access_reviews_webapi_index_endpoint()
    {
        $user = factory(User::class)->create();

        $user->roles()->attach(1);

        factory(Review::class)->create();

        $this->actingAs($user)->get($this->basePath)
            ->assertSuccessful()
            ->assertJsonStructure([
                'data' => [['id', 'author', 'position', 'quote']]
            ]);
    }

    public function test_user_cant_store_new_review()
    {
        $user = factory(User::class)->make();

        $this->actingAs($user)->post($this->basePath)
            ->assertStatus(404);
    }

    public function test_admin_can_store_new_review()
    {
        $user = factory(User::class)->create();

        $user->roles()->attach(1);

        $this->actingAs($user)->post($this->basePath, [
            'quote' => $quote = uniqid()
        ])->assertSuccessful();

        $this->assertDatabaseHas('reviews', [
            'quote' => $quote
        ]);
    }

    public function test_quote_required_to_store()
    {
        $user = factory(User::class)->create();

        $user->roles()->attach(1);

        $this->actingAs($user)->post($this->basePath)
            ->assertSessionHasErrors(['quote']);
    }
}
