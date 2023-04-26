<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Services\BaseService;
use App\Repositories\ProductRepository;

class ProductService extends BaseService
{
    protected $productrepository;

    public function __construct(ProductRepository $productrepository)
    {
       $this->productrepository = $productrepository;
    }

    public function getAll()
    {
       return $this->productrepository->all();
    }

    public function find(int $id)
    {
       return $this->productrepository->find($id);
    }

    public function create(Request $request)
    {
       return $this->productrepository->create($request->all());
    }

    public function update(int $id, Request $request)
    {
       return $this->productrepository->update($id,$request->all());
    }

    public function delete(int $id)
    {
       return $this->productrepository->delete($id);
    }

}
