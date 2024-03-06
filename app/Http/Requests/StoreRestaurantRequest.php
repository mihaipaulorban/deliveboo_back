<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRestaurantRequest extends FormRequest
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
            'name' => ['required', 'string'],
            'address' => ['required', 'string'],
            'logo' => ['nullable', 'image'],
            'p_iva' => ['required', 'integer', 'digits:11'],
            'cover_img' => ['nullable', 'image'],
        ];
    }
    public function messages(): array
    {
        return [
            'p_iva.required' => 'The VAT number must be 11 digits long',
        ];
    }
}
