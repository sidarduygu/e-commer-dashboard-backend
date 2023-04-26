<?php

namespace App\Services;

use App\Models\Shipping;
use Illuminate\Http\Request;
use App\Services\BaseService;
use App\Repositories\ShippingRepository;


class ShippingService extends BaseService
{
    protected $shippingrepository;

    public function __construct(ShippingRepository $shippingrepository)
    {
       $this->shippingrepository = $shippingrepository;
    }

    public function getAll()
    {
       return $this->shippingrepository->all();
    }

    public function find(int $id)
    {
       return $this->shippingrepository->find($id);
    }

    public function create(Request $request)
    {
       return $this->shippingrepository->create($request->all());
    }

    public function update(int $id, Request $request)
    {
       return $this->shippingrepository->update($id,$request->all());
    }

    public function delete(int $id)
    {
       return $this->shippingrepository->delete($id);
    }

}
