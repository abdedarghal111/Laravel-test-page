<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class UserEditRequest extends FormRequest
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
        $id = -1;
        if($this->route("user")){
            $id = $this->route("user")["id"];
        }

        return [
            'Nombre' => 'required',
            'NombreDeUsuario' => "required|unique:App\Models\User,username,$id,id",
            'Email' => "required|email:rfc|unique:App\Models\User,email,$id,id",
            'Contraseña' => 'nullable|min:8',
            "RepetirContraseña" => 'same:Contraseña'
        ];
    }
    
    public function messages()
    {
        return [
            'Nombre.required' => 'El nombre es obligatorio.',

            'NombreDeUsuario.required' => 'El de usuario es obligatorio.',
            'NombreDeUsuario.unique' => 'El nombre de usuario ya está en uso.',

            'Email.required' => 'El email es obligatorio.',
            'Email.email' => 'El email tiene que contener el formato de un email(usuario@servidor.terminación).',
            'Email.unique' => 'El email ya está en uso.',

            'Contraseña.required' => 'La contraseña es obligatoria.',
            'Contraseña.min' => 'El campo contraseña debe contener más de ocho caracteres.',

            'RepetirContraseña.required' => 'Este campo es obligatorio.',
            'RepetirContraseña.same' => 'Las contraseñas no coinciden.'
        ];
    }
}
