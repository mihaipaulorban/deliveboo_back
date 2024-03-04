<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FoodStoreRequest extends FormRequest
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
            'img' => ['image', 'required'],
            'description' => ['string', 'nullable'],
            'price' => ['required', 'decimal:5,2'],
            'is_visible' => ['required', 'boolean'],
            'is_vegetarian' => ['required', 'boolean'],
        ];
    }
}
