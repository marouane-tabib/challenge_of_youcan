<?php

namespace App\Services\ValidationServices;

use App\Interfaces\ValidationServiceInterfaces\ProductValidationServiceInterface;
use Illuminate\Support\Facades\Validator;

class ProductValidationService implements ProductValidationServiceInterface
{
    public function filterValidation(array $data)
    {
        $validator = Validator::make($data, [
            'sort_by' => 'nullable|string',
            'order_by' => 'nullable|string',
            'category_filter' => 'nullable|numeric',
        ]);

        if ($validator->fails()) {
            // throw new \Exception($validator->errors()->first($attribute));
            throw new \InvalidArgumentException($validator->errors()->first());
        }

        return $data;
    }

    public function storeValidation(array $data)
    {
        $validator = Validator::make($data, [
            'image' => 'nullable|image|max:7024',
            'name' => 'required|string|min:3|max:55',
            'description' => 'required|string|min:10',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric|min:1',
        ]);

        if ($validator->fails()) {
            // throw new \Exception($validator->errors()->first($attribute));
            throw new \InvalidArgumentException($validator->errors()->first());
        }

        return $data;
    }
}
