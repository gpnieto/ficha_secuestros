<?php

namespace Database\Seeders;

use App\Models\CatalogoSexo;
use Illuminate\Database\Seeder;

class GenderSeeder extends Seeder {

    /*
     * Create the gender registers on database provided by SIGI
     * */
    public function run(): void {
        CatalogoSexo::create(['descripcion' => 'Masculino']);
        CatalogoSexo::create(['descripcion' => 'Femenino']);
    }
}
