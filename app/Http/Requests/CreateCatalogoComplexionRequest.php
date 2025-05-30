<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCatalogoComplexionRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'descripcion' => 'required|string|unique:catalogo_complexion,descripcion'
        ];
    }

    public function messages(): array {
        return [
            'descripcion.unique' => 'La complexión ya existe'
        ];
    }
}
