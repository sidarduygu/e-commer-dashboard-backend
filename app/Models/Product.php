<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $with = ['product_category','discount'];

    

    public function product_category()
    {
        return $this->belongsTo(ProductCategory::class, 'category_id', 'id');
    }


    public function discount()
    {
        return $this->belongsTo(Discount::class);
    }


}
