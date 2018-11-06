<?php

namespace Tests\Feature\Products;

use App\User;
use Tests\TestCase;
use App\Models\Products\Order;
use App\Models\Products\Product;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class OrderTest extends TestCase
{
    public function test_unauth_user_cant_access_webapi_order_paymentstate()
    {
        $response = $this->patch('/webapi/orders/1/paymentstate');

        $response->assertRedirect('/login');
    }

    public function test_auth_user_without_admin_privileges_cant_update_order_state()
    {
        $user = factory(User::class)->make();

        $order = factory(Order::class)->create([
            'product_id' => factory(Product::class)->create()->id,
            'payment_state_id' => 1,
            'payment_type_id' => 1
        ]);

        $response = $this->actingAs($user)
            ->patch('/webapi/orders/' . $order->id . '/paymentstate', [
                'payment_state_id' => 2,
            ]);

        $response->assertStatus(404);
    }

    public function test_admin_can_update_order_payment_state()
    {
        $user = factory(User::class)->create();

        $user->roles()->attach(1);

        $order = factory(Order::class)->create([
            'product_id' => $id = factory(Product::class)->create()->id,
            'payment_state_id' => 1,
            'payment_type_id' => 1
        ]);

        $response = $this->actingAs($user)
            ->patch('/webapi/orders/' . $order->id . '/paymentstate', [
                'payment_state_id' => 2
            ]);

        $this->assertDatabaseHas('orders', [
            'product_id' => $id,
            'id' => $order->id,
            'payment_state_id' => 2
        ]);
    }

    public function test_admin_can_get_orders()
    {
        $user = factory(User::class)->create();

        $user->roles()->attach(1);

        $order = factory(Order::class)->create([
            'product_id' => $id = factory(Product::class)->create()->id,
            'payment_state_id' => 1,
            'payment_type_id' => 1
        ]);

        $response = $this->actingAs($user)
            ->get('/webapi/orders');

        $response->assertSuccessful();

        $response->assertJsonStructure([
            'data' => [['id']]
        ]);
    }

    public function test_admin_can_get_create_order_data()
    {
        $user = factory(User::class)->create();

        $user->roles()->attach(1);

        $response = $this->actingAs($user)
            ->get('/webapi/orders/create');

        $response->assertSuccessful();

        $response->assertJsonStructure([
            'products',
            'paymentTypes',
            'paymentStates',
            'businessEntities'
        ]);
    }

    public function test_admin_can_store_new_order()
    {
        $user = factory(User::class)->create();

        $user->roles()->attach(1);

        $response = $this->actingAs($user)
            ->post('/webapi/orders', [
                'product_id' => $id = factory(Product::class)->create()->id,
                'payment_state_id' => 1,
                'payment_type_id' => 1,
                'price' => 1,
                'user_id' => $user->id
            ]);

        $response->assertSuccessful();
    }

    public function test_product_id_required_to_store_new_order()
    {
        $user = factory(User::class)->create();

        $user->roles()->attach(1);

        $response = $this->actingAs($user)
            ->post('/webapi/orders');

        $response->assertSessionHasErrors(['product_id']);
    }

    public function test_numeric_product_id_required_to_store_new_order()
    {
        $user = factory(User::class)->create();

        $user->roles()->attach(1);

        $response = $this->actingAs($user)
            ->post('/webapi/orders', [
                'product_id' => 'string'
            ]);

        $response->assertSessionHasErrors(['product_id']);
    }

    public function test_existing_product_id_required_to_store_new_order()
    {
        $user = factory(User::class)->create();

        $user->roles()->attach(1);

        $response = $this->actingAs($user)
            ->post('/webapi/orders', [
                'product_id' => 56756756756757
            ]);

        $response->assertSessionHasErrors(['product_id']);
    }

    public function test_payment_type_id_required_to_store_new_order()
    {
        $user = factory(User::class)->create();

        $user->roles()->attach(1);

        $response = $this->actingAs($user)
            ->post('/webapi/orders');

        $response->assertSessionHasErrors(['payment_type_id']);
    }

    public function test_numeric_payment_type_id_required_to_store_new_order()
    {
        $user = factory(User::class)->create();

        $user->roles()->attach(1);

        $response = $this->actingAs($user)
            ->post('/webapi/orders', [
                'payment_type_id' => 'string'
            ]);

        $response->assertSessionHasErrors(['payment_type_id']);
    }

    public function test_existing_payment_type_id_required_to_store_new_order()
    {
        $user = factory(User::class)->create();

        $user->roles()->attach(1);

        $response = $this->actingAs($user)
            ->post('/webapi/orders', [
                'payment_type_id' => 56756756756757
            ]);

        $response->assertSessionHasErrors(['payment_type_id']);
    }

    public function test_payment_state_id_required_to_store_new_order()
    {
        $user = factory(User::class)->create();

        $user->roles()->attach(1);

        $response = $this->actingAs($user)
            ->post('/webapi/orders');

        $response->assertSessionHasErrors(['payment_state_id']);
    }

    public function test_numeric_payment_state_id_required_to_store_new_order()
    {
        $user = factory(User::class)->create();

        $user->roles()->attach(1);

        $response = $this->actingAs($user)
            ->post('/webapi/orders', [
                'payment_state_id' => 'string'
            ]);

        $response->assertSessionHasErrors(['payment_state_id']);
    }

    public function test_existing_payment_state_id_required_to_store_new_order()
    {
        $user = factory(User::class)->create();

        $user->roles()->attach(1);

        $response = $this->actingAs($user)
            ->post('/webapi/orders', [
                'payment_state_id' => 56756756756757
            ]);

        $response->assertSessionHasErrors(['payment_state_id']);
    }

    public function test_pprice_required_to_store_new_order()
    {
        $user = factory(User::class)->create();

        $user->roles()->attach(1);

        $response = $this->actingAs($user)
            ->post('/webapi/orders');

        $response->assertSessionHasErrors(['price']);
    }

    public function test_numeric_price_required_to_store_new_order()
    {
        $user = factory(User::class)->create();

        $user->roles()->attach(1);

        $response = $this->actingAs($user)
            ->post('/webapi/orders', [
                'price' => 'string'
            ]);

        $response->assertSessionHasErrors(['price']);
    }

    public function test_user_id_required_to_store_new_order()
    {
        $user = factory(User::class)->create();

        $user->roles()->attach(1);

        $response = $this->actingAs($user)
            ->post('/webapi/orders');

        $response->assertSessionHasErrors(['user_id']);
    }

    public function test_numeric_user_id_required_to_store_new_order()
    {
        $user = factory(User::class)->create();

        $user->roles()->attach(1);

        $response = $this->actingAs($user)
            ->post('/webapi/orders', [
                'user_id' => 'string'
            ]);

        $response->assertSessionHasErrors(['user_id']);
    }

    public function test_existing_user_id_required_to_store_new_order()
    {
        $user = factory(User::class)->create();

        $user->roles()->attach(1);

        $response = $this->actingAs($user)
            ->post('/webapi/orders', [
                'user_id' => 56756756756757
            ]);

        $response->assertSessionHasErrors(['user_id']);
    }

    public function test_admin_can_get_edit_order_data()
    {
        $user = factory(User::class)->create();

        $user->roles()->attach(1);

        $order = factory(Order::class)->create([
            'product_id' => $id = factory(Product::class)->create()->id,
            'payment_state_id' => 1,
            'payment_type_id' => 1
        ]);

        $response = $this->actingAs($user)
            ->get('/webapi/orders/' . $order->id . '/edit');

        $response->assertSuccessful();

        $response->assertJsonStructure([
            'data' => [
                'user',
                'paymentType',
                'product',
                'paymentState'
            ]
        ]);
    }

    public function test_admin_can_update_order()
    {
        $user = factory(User::class)->create();

        $user->roles()->attach(1);

        $order = factory(Order::class)->create([
            'product_id' => $id = factory(Product::class)->create()->id,
            'payment_state_id' => 1,
            'payment_type_id' => 1
        ]);

        $response = $this->actingAs($user)
            ->patch('/webapi/orders/' . $order->id, [
                'product_id' => $id = factory(Product::class)->create()->id,
                'payment_state_id' => 2,
                'payment_type_id' => 1,
                'price' => 1,
                'user_id' => $user->id
            ]);

        $this->assertDatabaseHas('orders', [
            'product_id' => $id,
            'id' => $order->id,
            'payment_state_id' => 2
        ]);
    }

    public function test_admin_can_destroy_order()
    {
        $user = factory(User::class)->create();

        $user->roles()->attach(1);

        $order = factory(Order::class)->create([
            'product_id' => $id = factory(Product::class)->create()->id,
            'payment_state_id' => 1,
            'payment_type_id' => 1
        ]);

        $response = $this->actingAs($user)
            ->delete('/webapi/orders/' . $order->id);

        $this->assertSoftDeleted('orders', [
            'product_id' => $id,
            'id' => $order->id
        ]);
    }
}
