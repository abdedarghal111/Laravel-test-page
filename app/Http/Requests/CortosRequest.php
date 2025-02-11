<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CortosRequest extends FormRequest
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
            'Título' => 'required',
            'Sinopsis' => 'required|min:10',
            'directorid' => 'required|exists:App\Models\Directores,id',
            "userid" => 'required|exists:App\Models\User,id'
        ];
    }
    
    public function messages()
    {
        return [
            'Título.required' => 'El título es obligatorio.',

            'Sinopsis.required' => 'La sinopsis es obligatoria.',
            'Sinopsis.min' => 'La sinopsis debe contener mínimo 10 caracteres.',

            'directorid.required' => 'El id del director es obligatorio.',
            'directorid.exists' => "El id del director especificado no existe.",

            'userid.required' => 'El id del usuario es obligatorio.',
            'userid.exists' => 'El id del usuario especificado no existe.'
        ];
    }
}
