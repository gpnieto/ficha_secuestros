<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateImageRequest extends FormRequest {
    public function rules(): array {
        return [
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048'
        ];
    }

    public function authorize(): bool {
        return true;
    }
}
