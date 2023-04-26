<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ProductVariantRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $decodeArray = json_decode($value, true);

            if(!is_array($decodeArray)) {
                $fail("The {$attribute} must be a valid JSON array. ");
                return;
            }

            foreach($decodeArray as $item) {
                if(!is_array(($item))) {
                   $fail("The {$attribute} constains an invalid item. ");
                   return;
                }

                if(empty($item['id']) || !is_numeric($item['id'])) {
                    $fail("The {$attribute}  constains an item with invalid 'id' property. ");
                return;
                }

                if(empty($item['stock']) || !is_numeric($item['stock'])) {
                    $fail("The {$attribute}  constains an item with invalid 'stock' property. ");
                return;
                }

                if(empty($item['price']) || !is_numeric($item['price'])) {
                    $fail("The {$attribute}  constains an item with invalid 'price' property. ");
                return;
                }

                if(empty($item['value']) || !is_numeric($item['value'])) {
                    $fail("The {$attribute}  constains an item with invalid 'value' property. ");
                return;
                }
            }
    }
}
