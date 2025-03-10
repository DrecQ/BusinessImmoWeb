<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PropertyFormRequest extends FormRequest
{
    /**
     * Détermine si l'utilisateur est autorisé à faire cette requête.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Règles de validation pour les champs du formulaire.
     */
    public function rules(): array
    {
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
            'postal_code' => ['required', 'string', 'min:3', 'max:10'], 
            'country' => ['required', 'string', 'max:255'],
            'sold' => ['required', 'boolean', 'in:0,1'], 
        ];
    }
}
