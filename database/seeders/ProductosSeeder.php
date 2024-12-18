<?php
namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ProductosSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            DB::table('productos')->insert([
                'nombre' => $faker->word,
                'descripcion' => $faker->sentence,
                'precio' => $faker->randomFloat(2, 1, 1000),
                'stock' => $faker->numberBetween(1, 100),
            ]);
        }
    }
}
