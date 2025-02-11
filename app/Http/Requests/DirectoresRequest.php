<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DirectoresRequest extends FormRequest
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
            'Nombre' => 'required',
            'Apellidos' => 'required'
        ];
    }
    
    public function messages()
    {
        return [
            'Nombre.required' => 'El nombre es obligatorio.',

            'Apellidos.required' => 'El campo apellidos es obligatorio.'
        ];
    }
}
