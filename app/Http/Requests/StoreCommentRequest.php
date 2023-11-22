<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCommentRequest extends FormRequest
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
            'user_id' => ['required', 'exists:users,id'],
            'post_id' => ['required', 'exists:posts,id'], // Ensures the post_id is provided and exists in the database
            'comment' => ['required', 'string', 'max:255'], // Validates the comment field
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:10240'], // Validates the image if provided
        ];
    }
}
