<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCatalogoSexoRequest extends FormRequest {
    public function rules() {
        return [
            'descripcion' => [
                'required',
                'string',
                Rule::unique('catalogo_sexo', 'descripcion')->ignore($this->route('sexo'))
            ]
        ];
    }

    public function authorize() {
        return true;
    }

    public function messages(): array {
        return [
            'descripcion.unique' => 'El sexo ya existe'
        ];
    }
}
