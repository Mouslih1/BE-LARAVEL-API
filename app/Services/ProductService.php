<?php

namespace App\Services;

use App\Models\Review;
use App\Models\Product;
use App\Models\ProductDetail;
use Illuminate\Support\Facades\Event;
use App\Events\ProductCreatedMailEvent;

class ProductService
{
    public function getProducts()
    {
        return Product::all();
    }

    public function getProduct($id)
    {
        return Product::find($id);
    }

    public function createProduct($data)
    {
        $product = Product::create($data);
        $product->details()->create($data);

        return $product;

        // Event::dispatch(new ProductCreatedMailEvent($product));



        /*$product = Product::create([
            'title' => $data['title'],
            'description' => $data['description'],
            'user_id' => $data['user_id']
        ]);

        if($product->details)
        {
            $product->details->create([
                'size' => $data['size'],
                'color' => $data['color'],
                'price' => $data['price']
            ]);
        }*/
    }

    public function updateProduct($id, $data)
    {
        $product = $this->getProduct($id);
        $product->title = $data['title'];
        $product->description = $data['description'];
        $product->user_id = $data['user_id'];
        $product->details->size = $data['size'];
        $product->details->color = $data['color'];
        $product->details->price = $data['price'];
        $product->save();
        $product->details->save();

        return $product;
    }

    public function deleteProduct($id)
    {
        $product = $this->getProduct($id);

        if($product->details)
        {
            $product->details()->delete();
        }

        if($product->reviews)
        {
            $product->reviews()->delete();
        }

        if($product->imagable)
        {
            $product->imagable()->delete();
        }

        $product->delete();

       /*if ($product) {
            $product->details ?? $product->details()->delete();
            $product->reviews ?? $product->reviews()->delete();
            $product->imagable ?? $product->imagable->delete();
        }

        $product->delete();*/
    }
}
