<?php

namespace Tests\Feature\Users;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserTest extends TestCase
{
    public function test_user_cant_get_users_data()
    {
        $user = factory(User::class)->make();

        $response = $this->actingAs($user)
            ->get('/webapi/users/email?query=a');

        $response->assertStatus(404);
    }

    public function test_admin_can_get_users_data()
    {
        $user = factory(User::class)->create();

        $user->roles()->attach(1);

        $response = $this->actingAs($user)
            ->get('/webapi/users/email?query=a');

        $response->assertSuccessful();

        $response->assertJsonStructure([
            'data' => [['id', 'name', 'email']]
        ]);
    }

    public function test_returns_searched_users_data()
    {
        $user = factory(User::class)->create();

        $user->roles()->attach(1);

        $response = $this->actingAs($user)
            ->get('/webapi/users/email?query=' . $user->email);

        $response->assertSuccessful();

        $response->assertJsonFragment([
            'id' => $user->id,
            'email' => $user->email
        ]);
    }
}
