<?php

namespace App\Repositories;

use App\Models\ProductVariant;


class ProductVariantRepository extends BaseRepository
{
    protected $model;

    public function __construct(ProductVariant $model)
    {
        parent::__construct($model);
    }
}
