<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariantOptionPrice extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = [
        'product_variant_option_id',
        'price'
    ];

}
