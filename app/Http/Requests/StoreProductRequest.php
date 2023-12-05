<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\File;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'product_image' => 'required|array',
            'product_image.*' => 'image|mimes:jpeg,png,jpg,gif',
            'product_name' => ['required', 'string', 'max:255'],
            'category_id' => ['required', 'exists:categories,id'],
            'product_description' => ['required', 'string', 'max:255'],
            'pre_order' => ['nullable'],
            'variation' => ['required', 'array'],
            'variation. * .variation_name' => ['required', 'string', 'max:255'],
            'variation. * .price' => ['required', 'string', 'max:255'],
            'variation. * .stock' => ['required', 'integer'],
            'weight' => ['required', 'string'],
            'height' => ['required', 'string'],
            'width' => ['required', 'string'],
            'length' => ['required', 'string'],
            'shipping_fee' => ['required', 'string'],
        ];
    }
}
