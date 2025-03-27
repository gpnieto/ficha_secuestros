<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCatalogoFrenteRequest extends FormRequest
{
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
            'descripcion' => 'required|string|unique:catalogo_frente,descripcion'
        ];
    }
    public function messages(): array
    {
        return [
            'descripcion.unique' => 'el tipo de frente que intenta ingresar ya existe'
        ];
    }
}
