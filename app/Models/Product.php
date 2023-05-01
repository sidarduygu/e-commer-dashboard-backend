<?php

namespace App\Models;

use Illuminate\Routing\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $with = ['product_category','discount','Images','size'];

    protected $appends = ['product_variants', 'shipping_id'];

    public function product_category()
    {
        return $this->belongsTo(ProductCategory::class, 'category_id', 'id');
    }

    public function discount()
    {
        return $this->belongsTo(Discount::class);
    }

    public function product_shipping()
    {
        return $this->hasMany(Shipping::class,'product_id','id');
    }

    public function Images()
    {
        return $this->hasMany(ProductImage::class,'product_id','id');
    }

    public function size()
    {
        return $this->hasOne(ProductSize::class)->withDefault([
            "weight_type" => null,
            "weight" => null,
            "width" => null,
            "height" => null,
            "length" => null,
        ]);
    }

    public function productShipping()
    {
        return $this->hasOne(ProductShipping::class);
    }

    public function product_variants()
    {
        return $this->hasMany(ProductVariant::class,'product_id','id');
    }

    public function product_variant_options()
    {
        return $this->hasMany(ProductVariantOption::class,'product_id','id');
    }

    public function product_variant_option_inventories()
    {
        return $this->hasMany(ProductVariantOptionInventory::class,'product_id','id');
    }

    public function product_variant_option_prices()
    {
        return $this->hasMany(ProductVariantOptionPrice::class,'product_id','id');
    }


     public function getShippingIdAttribute()
     {
         return optional($this->productShipping)->shipping_id;


     }

     public function getProductVariantsAttribute()
     {
         $productVariants = [];
         foreach($this->product_variant_option_inventories as $index =>  $pvoi) {
             $productVariants[$index ]['id'] = $pvoi->id;
             $productVariants[$index ]['stock']= $pvoi->stock;
         }

         foreach($this->product_variant_option_prices as $index =>  $pvop) {
             $productVariants[$index ]['id'] = $pvop->id;
             $productVariants[$index ]['price']= $pvop->price;
         }
          foreach($this->product_variant_options as $index => $pvo){
            $productVariants[$index ]['value']= $pvo->value;
          }
         return $productVariants;

    }
}
