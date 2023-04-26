<?php

namespace App\Repositories;


use App\Models\Shipping;
use App\Repositories\BaseRepository;



class ShippingRepository extends BaseRepository
{
    protected $model;

    public function __construct(Shipping $model)
    {
        parent::__construct($model);
    }
}
