<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePasswordFormRequest extends FormRequest
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
            'password' => 'required',
            'new_password' => 'required|string|min:8',
            'confirm_new_password' => 'required|string|min:8',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'El campo :attribute es obligatorio.',
            'new_password.min' => 'La contraseña debe tener al menos 8 caracteres.',
        ];
    }

    public function attributes()
    {
        return [
            'password' => 'Contraseña actual',
            'new_password' => 'Nueva contraseña',
            'confirm_new_password' => 'Confirmacion de la nueva contraseña',
        ];
    }
}
