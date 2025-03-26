<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCatalogoSexoRequest extends FormRequest {
    public function authorize(): bool {
        return true;
    }

    public function rules(): array {
        return [
            'descripcion' => 'required|string|unique:catalogo_sexo,descripcion'
        ];
    }

    public function messages(): array {
        return [
            'descripcion.unique' => 'El sexo ya existe'
        ];
    }
}
