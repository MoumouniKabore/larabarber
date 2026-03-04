<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMessageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Permet à tous les utilisateurs de soumettre un message
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    
    public function rules(): array
    {
        return [
            'first_name' => ['required', 'string', 'max:20'],
            'last_name'  => ['required', 'string', 'max:20'],
            'email'      => ['required', 'email', 'max:255'],
            'phone'      => ['required', 'string', 'max:10'],
            'subject'    => ['required', 'in:question générale,réservation,partenariat,réclamation,critique,autre'],
            'message'    => ['required', 'string', 'min:10'],
        ];
    }

    public function messages(): array
    {
        return [
            'first_name.required' => 'Le nom est obligatoire.',
            'first_name.max'      => 'Le nom ne doit pas dépasser 20 caractères.',
            'last_name.required'  => 'Le prénom est obligatoire.',
            'last_name.max'       => 'Le prénom ne doit pas dépasser 20 caractères.',
            'email.required'      => 'L\'adresse email est requise pour vous recontacter.',
            'email.email'         => 'Veuillez saisir une adresse email valide.',
            'phone.required'      => 'Le numéro de téléphone est nécessaire.',
            'phone.max'           => 'Le téléphone ne doit pas dépasser 10 caractères.',
            'subject.required'    => 'Veuillez choisir un sujet dans la liste.',
            'subject.in'          => 'Le sujet sélectionné n\'est pas valide.',
            'message.required'    => 'Un message est requis.',
            'message.min'         => 'Votre message doit contenir au moins 10 caractères.',
        ];
    }
}
