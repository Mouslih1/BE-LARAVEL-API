<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Services\ProductService;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductTest extends TestCase
{
    protected $productService;
    protected $product;

    public function setUp(): void
    {
        parent::setUp();
        $this->productService = $this->app->make(ProductService::class);
        $this->product = [
            'title' => 'new lakhar2',
            'description' => 'new description',
            'user_id' => 1,
            'size' => 22,
            'color' => 'red',
            'price' => 2500
        ];
    }

    /**
     * A basic feature test example.
     */
    public function test_create_product_without_data(): void
    {
        $response = $this->post('/api/products');

        $response->assertStatus(500);
    }

    public function test_create_product_without_auth(): void
    {
        $response = $this->withHeaders(['Accept' => 'application/json'])
            ->post('/api/products', $this->product);

        $response->assertStatus(401);
    }

    public function test_create_product_with_auth(): void
    {
        $user = User::first();
        $response = $this->withHeaders(['Accept' => 'application/json'])
            ->actingAs($user)
            ->post('/api/products');

        $response->assertStatus(406);
    }

    public function test_create_product_with_auth_and_data(): void
    {
        $user = User::first();
        $response = $this->withHeaders(['Accept' => 'application/json'])
            ->actingAs($user)
            ->post('/api/products', $this->product);

        $response->assertStatus(200);
    }
}
