<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, array<mixed>|\Illuminate\Contracts\Validation\ValidationRule|string>
     */
    public function rules(): array
    {
        switch ($this->method()) {
            case 'GET' :
                return [
                    'sort_by' => 'nullable|string',
                    'order_by' => 'nullable|string',
                    'category_filter' => 'nullable|numeric',
                ];

            case 'POST' :
                return [
                    'image' => 'nullable|image|max:7024',
                    'name' => 'required|string|min:3|max:55',
                    'description' => 'required|string|min:10',
                    'category_id' => 'required|exists:categories,id',
                    'price' => 'required|numeric|min:1',
                ];

            default: break;
        }

        return [
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Please enter a :attribute for your product.',
            'string' => 'The :attribute must be a string.',
            'numeric' => 'The :attribute must be a numeric value.',
            'min' => 'The :attribute must be at least :min characters long.',
            'max' => 'The :attribute must not exceed :max characters.',
            'exists' => 'The :attribute does not exist.',
            'image' => 'The uploaded file must be an image.',
        ];
    }
}
