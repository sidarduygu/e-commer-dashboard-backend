<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShippingStoreRequest  extends FormRequest
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
            'shipping_company' => 'required',
            'price' => 'required',
        ];
    }


    public function messages()
    {
        return [
            'name.required' => 'The name field is required',
            'shipping_company.required' => 'The shipping company field is required',
            'price.required' => 'The price field is required',
        ];
    }


}
