<?php

namespace Database\Seeders;

use App\Models\Product;
use Faker\Factory;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        // create 100 fake product
        $faker = Factory::create();
        for ($i = 0 ; $i < 100 ; $i++){

            // for faker image you can use this way to get random image
            $category = Product::create([
                'name'=>$faker->sentence(4),
                'price'=>  $faker->randomFloat(2, 0, 10000),
                'quantity'=>$faker->numberBetween(1, 100),
               'image'=> "https://picsum.photos/800/600?random=".rand(10000,99999),

            ]);

        }

    }
}
