<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ##### *note :  there are several ways to make a seeder for relationships many to many. do you think this is the best way? #####


        $categories = Category::pluck('id')->toArray();
        $products = Product::pluck('id');


        foreach ($products as $product) {
        $random_keys=array_rand($categories);
                DB::table('category_product')->insert(['category_id' => $categories[$random_keys], 'product_id' =>$product]);
            }

    }
}
