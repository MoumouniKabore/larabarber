<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTestimonieRequest extends FormRequest
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
            'first_name' => ['required', 'string', 'max:20'],
            'last_name'  => ['required', 'string', 'max:20'],
            'message'    => ['required', 'string', 'min:10'],
            'photo'      => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
        ];
    }

    public function messages(): array
    {
        return [
            'first_name.required' => 'Le nom est obligatoire.',
            'first_name.max'      => 'Le nom ne doit pas dépasser 20 caractères.',
            'last_name.required'  => 'Le prénom est obligatoire.',
            'last_name.max'       => 'Le prénom ne doit pas dépasser 20 caractères.',
            'message.required'    => 'Un message est requis.',
            'message.min'         => 'Le message doit faire au moins 10 caractères.',
            'photo.image'         => 'Le fichier doit être une image.',
            'photo.mimes'         => 'La photo doit être au format jpg, jpeg ou png.',
            'photo.max'           => 'La photo ne doit pas dépasser 2Mo.',
        ];
    }
}
