<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $with = ['product_category','discount','Images'];

    protected $appends = ['product_variants', 'shipping_id'];

    public function product_category()
    {
        return $this->belongsTo(ProductCategory::class, 'category_id', 'id');
    }

    public function discount()
    {
        return $this->belongsTo(Discount::class);
    }

    public function product_variant()
    {
        return $this->hasMany(ProductVariant::class,'product_id','id');
    }

    public function product_variant_option()
    {
        return $this->hasMany(ProductVariantOption::class,'product_id','id');
    }

    public function product_variant_option_inventories()
    {
        return $this->hasMany(ProductVariantOptionInventory::class,'product_id','id');
    }

    public function product_shipping()
    {
        return $this->hasMany(Shipping::class,'product_id','id');
    }

    public function Images()
    {
        return $this->hasMany(ProductImage::class,'product_id','id');
    }


}
