<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
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
        
        // On récupère l'ID de l'utilisateur (ajuste le nom du paramètre si différent dans tes routes)
        $userParam = $this->route('userResource') ?? $this->route('user');
        $userId = is_object($userParam) ? $userParam->id : $userParam;

        return [
            'first_name' => 'required|string|max:20',
            'last_name'  => 'required|string|max:20',
            
            // On ignore l'ID actuel pour l'email et le téléphone
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($userId),
            ],
            'phone' => [
                'required',
                'string',
                'max:20',
                Rule::unique('users')->ignore($userId),
            ],

            // Le mot de passe est optionnel à la modification
            'password' => 'nullable|string|min:8|confirmed',
            'photo'    => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ];
    }

    public function messages(): array {

        return [
            'first_name.required' => 'Le prénom est indispensable.',
            'first_name.max'      => 'Le prénom ne doit pas dépasser 20 caractères.',
            'last_name.required'  => 'Le nom est indispensable.',
            'last_name.max'       => 'Le prénom ne doit pas dépasser 20 caractères.',
            'email.email'         => 'Le format de l\'email est invalide.',
            'email.unique'        => 'Cet email est déjà utilisé.',
            'phone.unique'        => 'Ce numéro est déjà attribué à un autre utilisateur.',
            'password.min'        => 'Le nouveau mot de passe doit contenir 8 caractères minimum.',
            'password.confirmed'  => 'Les deux mots de passe ne sont pas identiques.',
            'photo.mimes'         => 'L\'image doit être au format jpeg, png ou jpg.',
            'photo.max'           => 'L\'image ne doit pas dépasser 2 Mo.',
        ];
    }
}
