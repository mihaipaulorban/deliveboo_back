<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FoodUpdateRequest extends FormRequest
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
    public function rules()
    {
        $rules = [
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'price' => 'required|numeric',
            'is_visible' => 'required|boolean',
            'is_vegetarian' => 'required|boolean',
        ];


        if (!$this->food->img) {
            // Se l'immagine non esiste é obbligatoria
            $rules['img'] = 'required|image|mimes:jpeg,png,jpg|max:2048';
        } else {
            // Se esiste già un'immagine diventa opzionale.
            $rules['img'] = 'sometimes|image|mimes:jpeg,png,jpg|max:2048';
        }

        return $rules;
    }
}
