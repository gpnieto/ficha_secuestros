<?php

namespace Database\Seeders;

use App\Models\CatalogoSexo;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
    public function run(): void {
        $this->call(GenderSeeder::class);
        User::factory()->defaultUser()->create();
    }
}
