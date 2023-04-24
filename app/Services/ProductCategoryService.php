<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Services\BaseService;
use App\Repositories\ProductCategoryRepository;

class ProductCategoryService extends BaseService
{
    protected $productcategoryrepository;

    public function __construct(ProductCategoryRepository $productcategoryrepository)
    {
       $this->productcategoryrepository = $productcategoryrepository;
    }

    public function getAll()
    {
       return $this->productcategoryrepository->all();
    }

    public function find(int $id)
    {
       return $this->productcategoryrepository->find($id);
    }

    public function create(Request $request)
    {
       return $this->productcategoryrepository->create($request->all());
    }

    public function update(int $id, Request $request)
    {
       return $this->productcategoryrepository->update($id,$request->all());
    }

    public function delete(int $id)
    {
       return $this->productcategoryrepository->delete($id);
    }

}
