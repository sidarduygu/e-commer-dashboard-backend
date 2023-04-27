<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Services\BaseService;
use App\Repositories\ProductImageRepository;

class ProductImageService extends BaseService
{
    protected $productimagerepository;

    public function __construct(ProductImageRepository $productimagerepository)
    {
       $this->productimagerepository = $productimagerepository;
    }

    public function getAll()
    {
       return $this->productimagerepository->all();
    }

    public function find(int $id)
    {
       return $this->productimagerepository->find($id);
    }

    public function create(Request $request)
    {
      return $this->productimagerepository->create($request->all());

    }

    public function update(int $id, Request $request)
    {
       return $this->productimagerepository->update($id,$request->all());
    }

    public function delete(int $id)
    {
       return $this->productimagerepository->delete($id);
    }

}
