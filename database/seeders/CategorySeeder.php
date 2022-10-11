<?php

namespace Database\Seeders;

use App\Models\Category;
use Faker\Factory;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        // create 50 fake category
        $faker = Factory::create();
        for ($i = 0 ; $i < 3 ; $i++){

            $category = Category::create(['name'=>$faker->sentence(1)]);

        }
    }
}
