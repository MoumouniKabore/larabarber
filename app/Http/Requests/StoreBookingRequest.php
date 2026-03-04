<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Tu peux ajouter une logique d'autorisation ici si nécessaire
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    
    public function rules(): array
    {
        return [
            'first_name' => 'required|string|max:20',
            'last_name'  => 'required|string|max:20',
            'phone'      => 'required|string|max:10', // Tu peux ajouter des regex ici pour le format FR
            'service'    => 'required|string',
            'day'        => 'required|string',
            'time'       => 'required|string',
        ];
    }

    // Personnalisation des messages d'erreur
    public function messages(): array
    {
        return [
            'first_name.required' => 'Le nom est obligatoire.',
            'first_name.max'      => 'Le nom ne doit pas dépasser 20 caractères.',
            'last_name.required'  => 'Le prénom est obligatoire.',
            'last_name.max'       => 'Le prénom ne doit pas dépasser 20 caractères.',
            'phone.required'      => 'Le numéro de téléphone est obligatoire.',
            'phone.max'           => 'Le téléphone ne doit pas dépasser 10 caractères.',
            'service.required'    => 'Veuillez choisir un service.',
            'day.required'        => 'Veuillez choisir un jour.',
            'time.required'       => 'Veuillez choisir une heure.',
        ];
    }
}
