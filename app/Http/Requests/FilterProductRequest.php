<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FilterProductRequest extends FormRequest
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
        return [
            'sort_by' => 'nullable|string',
            'order_by' => 'nullable|string',
            'category_filter' => 'nullable|numeric',
        ];
    }

    public function messages()
    {
        return [
            'string' => 'The :attribute must be a string.',
            'numeric' => 'The :attribute must be a numeric value.',
        ];
    }
}
