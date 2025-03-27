<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCatalogoTezRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return
            [
               'descripcion' => 'required|string|unique:catalogo_tez,descripcion'
            ];

    }

    public function messages(): array
    {
        return [
            'descripcion.unique' => 'La descripción del Tez ya existe'
        ];
    }
}
