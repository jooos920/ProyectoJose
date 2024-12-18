<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ServiciosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            DB::table('servicios')->insert([
                'name' => $faker->catchPhrase, // Nombre del servicio
                'description' => $faker->paragraph, // Descripción detallada
                'price' => $faker->randomFloat(2, 50, 500), // Precio entre 50 y 500 con 2 decimales
                'duration' => $faker->numberBetween(30, 180), // Duración entre 30 y 180 minutos
                'status' => $faker->numberBetween(0, 1), // Activo o inactivo
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
