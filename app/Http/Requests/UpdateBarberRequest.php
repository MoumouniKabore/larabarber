<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateBarberRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        // On récupère l'ID du coiffeur depuis la route de manière sécurisée
        $barberParam = $this->route('barberResource') ?? $this->route('barber');
        $barberId = is_object($barberParam) ? $barberParam->id : $barberParam;

        return [
            'first_name' => 'required|string|max:20',
            'last_name'  => 'required|string|max:20',
            'address'    => 'required|string|max:500',
            'fonction'   => 'required|string|max:100',
            
            'email' => [
                'required',
                'email',
                Rule::unique('barbers')->ignore($barberId),
            ],
            'phone' => [
                'required',
                'string',
                'max:20',
                Rule::unique('barbers')->ignore($barberId),
            ],

            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ];
    }

    /**
     * Obtenir les messages d'erreur personnalisés.
     */
    public function messages(): array
    {
        return [
            'first_name.required' => 'Le nom est obligatoire.',
            'first_name.max'      => 'Le nom ne doit pas dépasser 20 caractères.',
            'last_name.required'  => 'Le prénom est obligatoire.',
            'last_name.max'       => 'Le prénom ne doit pas dépasser 20 caractères.',
            'address.required'     => 'L\'adresse est requise.',
            'fonction.required'    => 'La fonction du coiffeur est obligatoire.',
            
            'email.required' => 'L\'adresse email est obligatoire.',
            'email.email'    => 'Veuillez entrer une adresse email valide.',
            'email.unique'   => 'Cette adresse email est déjà utilisée par un autre coiffeur.',
            
            'phone.required' => 'Le numéro de téléphone est obligatoire.',
            'phone.unique'   => 'Ce numéro de téléphone est déjà utilisé.',
            
            'status.required' => 'Le statut est obligatoire.',
            'status.in'       => 'Le statut choisi n\'est pas valide.',
            
            'photo.image' => 'Le fichier doit être une image.',
            'photo.mimes' => 'L\'image doit être au format : jpeg, png ou jpg.',
            'photo.max'   => 'L\'image ne doit pas dépasser 2 Mo.',
        ];
    }
}