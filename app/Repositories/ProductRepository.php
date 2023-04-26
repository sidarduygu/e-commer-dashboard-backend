<?php

namespace App\Repositories;

use App\Models\Product;
use App\Repositories\BaseRepository;



class ProductRepository extends BaseRepository
{
    protected $model;

    public function __construct(Product $model)
    {
        parent::__construct($model);
    }
}
