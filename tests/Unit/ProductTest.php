<?php

namespace Tests\Unit;

// use PHPUnit\Framework\TestCase;

use Tests\TestCase;
use App\Models\Product;
use App\Services\ProductService;

class ProductTest extends TestCase
{
    protected $productService;
    protected $product;

    public function setUp() : void
    {
        parent::setUp();
        $this->productService = $this->app->make(ProductService::class);
        $this->product = [
            'title' => 'lakhar',
            'description' => 'new description',
            'user_id' => 1,
            'size' => 22,
            'color' => 'red',
            'price' => 2500
        ];
    }

    /**
     * A basic unit test example.
     */
   /* public function test_product_create_in_database(): void
    {
        $createProduct = $this->productService->createProduct($this->product);
        $this->assertDatabaseHas('products', [
            'title' => 'test Product'
        ]);

        $this->assertDatabaseHas('product_details', [
            'size' => 22
        ]);


      /*  $productService = new ProductService();

        $data = [
            'title' => 'Test Product',
            'description' => 'Product Description',
            'user_id' => 1,
            'size' => 5000,
            'color' => 'Blue',
            'price' => 19.99,
        ];

        $createdProduct = $productService->createProduct($data);

        $this->assertInstanceOf(Product::class, $createdProduct);
        $this->assertEquals('Test Product', $createdProduct->title);
        $this->assertDatabaseHas('products', [
            'title' => 'Test Product'
        ]);

        $this->assertDatabaseHas('product_details', [
            'size' => 5000
        ]);
    }*/

   /* public function test_delete_product() : void
    {
        $this->productService->deleteProduct(19);
        $this->assertDatabaseMissing('products', [
            'title' => 'oussama'
        ]);
        $this->assertDatabaseMissing('product_details', [
            'size' => 66
        ]);
    }*/
}
