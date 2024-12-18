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
                'name' => $faker->catchPhrase,
                'description' => $faker->paragraph, 
                'price' => $faker->randomFloat(2, 50, 500), 
                'duration' => $faker->numberBetween(30, 180),
            ]);
        }
    }
}
