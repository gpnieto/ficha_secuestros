<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateImageRequest extends FormRequest {
    public function rules(): array {
        return [
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ];
    }

    public function authorize(): bool {
        return true;
    }

    public function messages(): array {
        return [
            'image.image'     => 'El archivo debe ser una imagen.',
            'image.mimes' => 'Solo se permiten imágenes en formato JPG, JPEG o PNG.',
            'image.max' => 'El tamaño máximo de la imagen es 2MB.',
        ];
    }

}
