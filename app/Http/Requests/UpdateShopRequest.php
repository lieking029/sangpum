<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateShopRequest extends FormRequest
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
            'shop_name' => ['required', 'string', 'max:255'],
            'shop_address' => ['required', 'string', 'max:255'],
            'shop_barangay' => ['required', 'string', 'max:255'],
            'date_established' => ['required', 'string', 'max:255'],
            'contact_number' => ['required', 'string', 'max:13', 'min:11'],
            'dti_number' => ['required', 'string', 'max:255'],
        ];
    }
}
