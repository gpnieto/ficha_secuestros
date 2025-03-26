<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest {
    public function authorize(): bool {
        return true;
    }

    public function rules(): array {
        return [
            'email' => [
                'required',
                'email'
            ],
            'password' => 'required|string',
            'remember' => 'boolean|nullable'
        ];
    }

    public function messages() {
        return [
            'email.required' => 'El correo es obligatorio',
            'email.email' => 'El correo debe ser un correo válido',
            'email.exists' => 'El usuario no existe en nuestra base de datos',
            'password.required' => 'La contraseña es obligatoria',
            'password.string' => 'La contraseña debe ser un texto',
        ];
    }
}
