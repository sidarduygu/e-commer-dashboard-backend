<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Services\BaseService;
use App\Repositories\ProductRepository;
use App\Repositories\ProductVariantRepository;

class ProductService extends BaseService
{
    protected $productrepository;
    protected $productvariantrepository;

    public function __construct(ProductRepository $productrepository, ProductVariantRepository $productvariantrepository)
    {
       $this->productrepository = $productrepository;
       $this->productvariantrepository = $productvariantrepository;
    }

    public function getAll()
    {
       return $this->productrepository->all();
    }

    public function find(int $id)
    {
       return $this->productrepository->find($id);
    }

    public function create(Request $request)
    {
        $product = $this->productrepository->create($request->except('size', 'images', 'shipping_id', 'product_variants'));

       if($request->has('images') && is_array($request->images) && count($request->images)){
         $images = $request->images;
         foreach ($images as $image) {
            $imageData = uploadImage($image, 'product');
            $imageData['product_id'] = $product->id;
            $product->images()->create($imageData);
         }
      }

      $product->size()->create($request->size);
      $product->productShipping()->create(['shipping_id' => $request->shipping_id]);
      $this->createVariants($request->product_variants,$product);
    }

    protected function createVariants(string $productVariants, Product $product)
    {
        $productVariants = json_decode($productVariants,true);


        foreach($productVariants as $variant)
        {
            if(is_array($variant) && isset($variant['id'])){
                $productVariantOption = $product->product_variant_options()->create([
                    'product_variant_id' => $variant['id'],
                    'value' => $variant['value']
                ]);

                $product->product_variant_option_inventories()->create([
                    'product_variant_option_id' => $productVariantOption->id,
                    'stock' => $variant['stock']
                ]);

                 $product->product_variant_option_prices()->create([
               'product_variant_option_id' => $productVariantOption->id,
               'price' => $variant['price']
                ]);
            }

        }
    }

    public function update(int $id, Request $request)
    {
       $product = $this->productrepository->find($id);
       $product->fill($request->except([ 'images']));
       $product->save();
       $this->updateProductAssociations($product,$request);
    }

    protected function updateProductAssociations(Product $product, Request $request)
   {
       $this->manageProductImages($product, $request);
       $product->size()->updateOrCreate([], $request->size);
       $product->productShipping()->updateOrCreate([], ['shipping_id' => $request->shipping_id]);

   }





    protected function manageProductImages(Product $product , Request $request)
    {
        if ($request->has('deleted_images') && is_array($request->deleted_images) && count($request->deleted_images)) {
                  foreach ($request->deleted_images as $image) {
                    $product->images()->findOrFail($image['id'])->delete();
                 }
           }

        if($request->has('images') && is_array($request->images) && count($request->images)){
            $images = $request->images;
            foreach($images as $image){
                if($image->isValid()){
                    $imageData = uploadImage($image, 'product');
                    $imageData['product_id'] = $product->id;
                    $product->Images()->create($imageData);
                }
            }
        }
    }

    public function delete($id)
    {
        
    }

}


