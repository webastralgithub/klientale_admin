<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required',
            'slug' => 'required',
            'sub_title' => 'required',
            // 'meta_title' => 'required',
            // 'meta_keywords' => 'required',
            // 'meta_description' => 'required',
            'slug' => 'required|unique:products',
            'code' => 'required|unique:products',
            'notes' => 'required',
            'buying_price' => 'required|numeric',
            'selling_price' => 'required|numeric',
            'tax' => 'required',
            // 'quantity' => 'required|numeric',
            // 'product_images' => 'required|mimes:jpeg,png,jpg',
            'category_id' => 'required'
        ];
    }
    public function messages(): array
    {
        return [
            'category_id.required' => 'The category field is required',
        ];
    }
}
