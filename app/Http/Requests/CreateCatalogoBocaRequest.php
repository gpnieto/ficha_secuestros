<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCatalogoBocaRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'descripcion' => 'required|string|unique:catalogo_boca,descripcion'
        ];
    }
    public function messages(): array
    {
        return [
            'descripcion.unique' => 'el tipo de boca ya existe'
        ];
    }
}
