<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\ProductService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Product\CreateProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;
use App\Models\Product;

class ProductController extends BaseController
{
    public $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->productService->getProducts();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateProductRequest $createProductRequest)
    {
        if(!empty($createProductRequest->getErrors()))
        {
            return response()->json($createProductRequest->getErrors(), 406);
        }
        $data = $createProductRequest->request()->all();
        $data['user_id'] = Auth::user()->id;
        $response = $this->productService->createProduct($data);
        return $this->sendResponse($response);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $updateProductRequest, string $id)
    {
        if(!empty($updateProductRequest->getErrors()))
        {
            return response()->json($updateProductRequest->getErrors(), 406);
        }
        $data = $updateProductRequest->request()->all();
        $data['user_id'] = Auth::user()->id;
        $response = $this->productService->updateProduct($id,$data);
        return $this->sendResponse($response);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        $this->productService->deleteProduct($id);
        return $this->sendResponse('deleted successfully');
    }
}
