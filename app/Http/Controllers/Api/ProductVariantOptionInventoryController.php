<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use App\Models\ProductVariantOptionInventory;

class ProductVariantOptionInventoryController extends ApiController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return  ProductVariantOptionInventory::all();
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
    public function show(ProductVariantOptionInventory $productVariantOptionInventory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductVariantOptionInventory $productVariantOptionInventory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProductVariantOptionInventory $productVariantOptionInventory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductVariantOptionInventory $productVariantOptionInventory)
    {
        //
    }
}
