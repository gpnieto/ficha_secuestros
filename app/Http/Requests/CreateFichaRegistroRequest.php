<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateFichaRegistroRequest extends FormRequest
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
            'nuc' => 'nullable|string|max:255',
            'apellido_paterno' => 'nullable|string|max:255',
            'apellido_materno' => 'nullable|string|max:255',
            'nombre' => 'nullable|string|max:255',
            'fecha_secuestro' => 'nullable|date',
            'lugar_secuestro' => 'nullable|string|max:255',
            'sexo' => 'nullable|string|max:255',
            'edad' => 'nullable|integer|min:0|max:120',
            'fecha_nacimiento' => 'nullable|date',
            'complexion' => 'nullable|string|max:255',
            'tez' => 'nullable|string|max:255',
            'estatura' => 'nullable|string|max:255',
            'descripcion_cabello' => 'nullable|string|max:255',
            'descripcion_frente' => 'nullable|string|max:255',
            'descripcion_cejas' => 'nullable|string|max:255',
            'descripcion_ojos' => 'nullable|string|max:255',
            'descripcion_nariz' => 'nullable|string|max:255',
            'descripcion_boca' => 'nullable|string|max:255',
            'descripcion_orejas' => 'nullable|string|max:255',
            'descripcion_labios' => 'nullable|string|max:255',
            'descripcion_menton' => 'nullable|string|max:255',
            'descripcion_cara' => 'nullable|string|max:255',
            'barba_bigote' => 'nullable|string|max:255',
            'señas_particulares' => 'nullable|string|max:255',
            'ropa' => 'nullable|string|max:255',
//            'fotografia' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ];
    }

    public function messages(): array
    {
        return[
            'edad.integer'         => 'La edad debe ser un número entero.',
            'edad.min'             => 'La edad no puede ser menor a 0.',
            'edad.max'             => 'La edad no puede ser mayor a 120.',
//            'fotografia.image'     => 'El archivo debe ser una imagen.',
//            'fotografia.mimes'     => 'Solo se permiten imágenes en formato JPG, JPEG o PNG.',
//            'fotografia.max'       => 'El tamaño máximo de la imagen es 2MB.',
        ];
    }
}
