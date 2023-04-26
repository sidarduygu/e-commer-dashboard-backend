<?php

namespace App\Http\Controllers\Api;

use App\Models\Discount;
use Illuminate\Http\Request;
use App\Services\DiscountService;
use App\Http\Controllers\ApiController;

class DiscountController extends ApiController
{
    protected $discountService;

    public function __construct(DiscountService $discountService)
    {
        $this->discountService = $discountService;

    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json($this->discountService->getall());
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            return response()->json($this->discountService->create($request));
        }catch(\Exception $e) {
            return $e;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
         return response()->json($this->discountService->find($id));
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        try{
            return response()->json($this->discountService->update($id,$request));
        }catch(\Exception $e) {
            return $e;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        try{
            return response()->json($this->discountService->delete($id));
        }catch(\Exception $e) {
            return $e;
        }
    }
}
