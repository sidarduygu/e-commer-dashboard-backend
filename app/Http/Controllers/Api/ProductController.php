<?php

namespace App\Http\Controllers\Api;

use App\Models\product;
use Illuminate\Http\Request;
use App\Services\ProductService;
use App\Http\Controllers\ApiController;



class ProductController extends ApiController
{
    protected $productService;


    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;

    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json($this->productService->getAll());
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(product $product)
    {
        //
    }
}
