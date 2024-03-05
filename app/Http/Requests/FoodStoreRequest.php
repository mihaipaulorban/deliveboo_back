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
            // Regex per accettare il formato con il punto decimale
            'price' => ['required', 'regex:/^\d+(\.\d{1,2})?$/'],
            'is_visible' => ['required', 'boolean'],
            'is_vegetarian' => ['required', 'boolean'],
        ];
    }

    // Messaggi di errore personalizzati
    public function messages()
    {
        return [
            'name.required' => 'The food name is required.',
            'img.image' => 'The image must be a valid image file.',
            'img.required' => 'An image is required for the food.',
            'description.string' => 'The description must be a string.',
            'price.required' => 'The price is required.',
            'price.regex' => 'The price must be a number with up to two decimal places and use a dot as the decimal separator.',
            'is_visible.required' => 'Please specify if the food is visible or not.',
            'is_visible.boolean' => 'The visibility value must be true or false.',
            'is_vegetarian.required' => 'Please specify if the food is vegetarian or not.',
            'is_vegetarian.boolean' => 'The vegetarian value must be true or false.',
        ];
    }
}
