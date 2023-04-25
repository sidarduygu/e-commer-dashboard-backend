<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Services\BaseService;
use App\Repositories\DiscountRepository;


class DiscountService extends BaseService
{
    protected $discountrepository;

    public function __construct(DiscountRepository $discountrepository)
    {
       $this->discountrepository = $discountrepository;
    }

    public function getAll()
    {
       return $this->discountrepository->all();
    }

    public function find(int $id)
    {
       return $this->discountrepository->find($id);
    }

    public function create(Request $request)
    {
       return $this->discountrepository->create($request->all());
    }

    public function update(int $id, Request $request)
    {
       return $this->discountrepository->update($id,$request->all());
    }

    public function delete(int $id)
    {
       return $this->discountrepository->delete($id);
    }

}
