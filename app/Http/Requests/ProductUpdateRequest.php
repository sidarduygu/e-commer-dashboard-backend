<?php

namespace App\Http\Requests;


use App\Rules\ProductVariantRule;
use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        if(empty(auth()->user())) {
            return false;
        }

        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|max:161',
            'category_id' => 'required|exists:product_categories,id',
            'sku' => 'required|max:20',
            'shipping_id' => 'required|exists:shippings,id',
            'product_variants' => ['required', new ProductVariantRule()]
        ];
    }


    public function messages()
    {
        return [
            'name.required' => 'The name field is required.',
            'name.max' => 'The name field may not be greater than :max characters.',
            'category_id.required' => 'The name category_id is required.',
        ];
    }

    public function passedValidation()
    {
       $requestData = $this->except('created_at','updated_at', 'product_category', 'discount', 'product_variant_options', 'product_variant_option_inventories', 'product_variant_option_prices', 'product_shipping');
        $this->replace(array_merge($requestData, [
            'product_variants' => json_decode($this->product_variants, true),
            'deleted_images' => json_decode($this->deleted_images, true),
            'deleted_variants' => json_decode($this->deleted_variants, true),
        ]));
    }
}


