<?php

namespace Database\Factories;

use App\Models\CatalogoSexo;
use Illuminate\Database\Eloquent\Factories\Factory;

class CatalogoSexoFactory extends Factory {
//    protected $model = CatalogoSexo::class;

    public function definition() : array {
        return [
            'descripcion' => fake()->words(5)
        ];
    }
}
