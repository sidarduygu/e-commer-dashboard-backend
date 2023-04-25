<?php

namespace App\Repositories;

use App\Models\ProductCategory;

class ProductCategoryRepository extends BaseRepository
{
    protected $model;

    public function __construct(ProductCategory $model)
    {
        parent::__construct($model);
    }
}
