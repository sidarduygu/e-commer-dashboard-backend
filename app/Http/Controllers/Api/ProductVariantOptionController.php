<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\ProductVariantOption;
use App\Http\Controllers\ApiController;

class ProductVariantOptionController extends ApiController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ProductVariantOption::all();
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
    public function show(ProductVariantOption $productVariantOption)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductVariantOption $productVariantOption)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProductVariantOption $productVariantOption)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductVariantOption $productVariantOption)
    {
        //
    }
}
