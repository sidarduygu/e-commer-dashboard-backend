<?php

namespace App\Http\Controllers\Api;

use App\Models\product;
use Illuminate\Http\Request;
use App\Services\ProductService;
use App\Http\Controllers\ApiController;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;



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
    public function index(Request $request)
    {
        return response()->json($this->productService->getAll($request));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductStoreRequest $request)
    {
        try{
            return response()->json($this->productService->create($request));
        }
        catch(\Exception $e) {
            return $e;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        try {
            return response()->json($this->productService->find($id));
        } catch (\Exception $e) {
            return $e;
            //return response()->json(['error' => 'An error occurred'], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductUpdateRequest $request,int $id)
    {
        try{
            return response()->json($this->productService->update($id,$request));
        }catch (\Exception $e) {
            return $e;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        try {
            return response()->json($this->productService->delete($id));
        } catch (\Exception $e) {
            return $e;
        }
    }
}
