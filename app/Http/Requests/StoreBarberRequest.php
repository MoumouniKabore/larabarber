<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBarberRequest extends FormRequest
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
            'email'      => 'required|email|unique:barbers,email',
            'phone'      => 'required|string|max:20',
            'fonction'   => 'required|string|max:100',
            'address'    => 'required|string|max:500',
            'photo'      => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ];
    }

    public function messages(): array {
        return [
            'first_name.required' => 'Le nom est obligatoire.',
            'first_name.max'      => 'Le nom ne doit pas dépasser 20 caractères.',
            'last_name.required'  => 'Le prénom est obligatoire.',
            'last_name.max'       => 'Le prénom ne doit pas dépasser 20 caractères.',
            'email.required' => 'Le email est obligatoire.',
            'email.unique' => 'Cette adresse email est déjà utilisée par un autre coiffeur.',
            'photo.image'  => 'Le fichier doit être une image.',
            'photo.max'    => "L'image ne doit pas dépasser 2 Mo.",
        ];
    }
}
