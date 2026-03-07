<?php

namespace App\Http\Requests;

// use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateBarberRequest extends StoreBarberRequest
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
        
        // On récupère l'instance du coiffeur depuis la route
        $barber = $this->route('barber');

        // On fusionne les règles du parent avec les modifications spécifiques
        return array_merge(parent::rules(), [
            'email' => [
                'required', 
                'email', 
                Rule::unique('barbers')->ignore($barber->id)
            ],
            // On peut aussi rendre la photo optionnelle si besoin
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);
    }
}
