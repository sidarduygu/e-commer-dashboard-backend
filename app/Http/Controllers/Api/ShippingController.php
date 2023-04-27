<?php

namespace App\Http\Controllers\Api;

use App\Models\Shipping;
use Illuminate\Http\Request;
use App\Services\ShippingService;
use App\Http\Controllers\ApiController;
use App\Http\Requests\ShippingStoreRequest;


class ShippingController extends ApiController
{

    protected $shippingservice;


    public function __construct(ShippingService $shippingservice)
    {
       $this->shippingservice = $shippingservice;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       return response()->json($this->shippingservice->getAll());
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
    public function store(ShippingStoreRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Shipping $shipping)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Shipping $shipping)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Shipping $shipping)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Shipping $shipping)
    {
        //
    }
}
