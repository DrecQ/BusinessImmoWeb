<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PropertyFormRequest extends FormRequest
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
        // Règles de validation pour les champs du formulaire
            return [
                'title' => ['required', 'string', 'max:255'],
                'description' => ['required', 'string', 'min:10'],
                'surface' => ['required', 'numeric', 'min:1'],
                'rooms' => ['required', 'integer', 'min:1'],
                'bedrooms' => ['required', 'integer', 'min:0'],
                'bathrooms' => ['required', 'integer', 'min:0'],
                'floor' => ['nullable', 'integer'],
                'price' => ['required', 'numeric', 'min:0'],
                'city' => ['required', 'string', 'max:100'],
                'address' => ['required', 'string', 'max:255'],
                'postal_code' => ['required', 'string', 'regex:/^\d{4,5}$/'],
                'country' => ['required', 'string', 'max:255'],
                'sold' => ['required', 'boolean']
            ];
    }
}
