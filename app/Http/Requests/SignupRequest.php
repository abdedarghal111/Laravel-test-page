<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SignupRequest extends FormRequest
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
            'UserOrEmail' => "required",
            'Contraseña' => 'required|min:8'
        ];
    }

    public function messages()
    {
        return [
            'UserOrEmail.required' => 'El nombre de usuario o email es obligatorio.',

            'Contraseña.required' => 'La contraseña es obligatoria.',
            'Contraseña.min' => 'El campo contraseña debe contener más de ocho caracteres.'
        ];
    }
}
