<?php

namespace App\Repositories;

use App\Models\Discount;


class DiscountRepository extends BaseRepository
{
    protected $model;

    public function __construct(Discount $model)
    {
        parent::__construct($model);
    }
}
