<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCatalogoCejasRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'descripcion' => 'required|string|unique:catalogo_cejas,descripcion'
        ];
    }
    public function messages(): array
    {
        return [
            'descripcion.unique' => 'El tipo de cejas ya existe'
        ];
    }
}
