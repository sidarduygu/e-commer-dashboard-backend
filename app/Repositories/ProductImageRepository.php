<?php

namespace App\Repositories;

use App\Models\ProductImage;


class ProductImageRepository extends BaseRepository
{
    protected $model;

    public function __construct(ProductImage $model)
    {
        parent::__construct($model);
    }
}
