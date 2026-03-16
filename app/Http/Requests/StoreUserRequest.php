<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
    public function rules(): array {

        return [
            'first_name' => 'required|string|max:20',
            'last_name'  => 'required|string|max:20',
            'email'      => 'required|email|unique:users,email',
            'phone'      => 'required|string|unique:users,phone|max:20',
            'password'   => 'required|string|min:8|confirmed',
            'is_admin'   => 'boolean',
            'photo'      => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ];
    }

    public function messages(): array {

        return [
            'first_name.required' => 'Le prénom est indispensable.',
            'first_name.max'      => 'Le prénom ne doit pas dépasser 20 caractères.',
            'last_name.required'  => 'Le nom est indispensable.',
            'last_name.max'       => 'Le prénom ne doit pas dépasser 20 caractères.',
            'email.required'      => 'L\'adresse email est requise.',
            'email.email'         => 'Le format de l\'email est invalide.',
            'email.unique'        => 'Cet email est déjà utilisé.',
            'phone.required'      => 'Le numéro de téléphone est obligatoire.',
            'phone.unique'        => 'Ce numéro de téléphone appartient déjà à un compte.',
            'password.required'   => 'Le mot de passe est obligatoire.',
            'password.min'        => 'Le mot de passe doit faire au moins 8 caractères.',
            'password.confirmed'  => 'La confirmation du mot de passe ne correspond pas.',
            'photo.image'         => 'Le fichier doit être une image.',
            'photo.max'           => 'L\'image ne doit pas dépasser 2 Mo.',
        ];
    }
}
