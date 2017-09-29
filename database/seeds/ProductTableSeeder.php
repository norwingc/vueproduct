<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use App\Product;
use App\Category;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        Product::truncate();
        Category::truncate();

        foreach (range(1, 10) as $key => $value) {
            Category::create([
                'name' => $faker->word
            ]);
        }

        foreach (range(1,10) as $key => $value) {
            Product::create([
                'name'        => $faker->word,
                'stock'       => $faker->randomDigit(3),
                'description' => $faker->paragraph(1),
                'category_id' => $faker->randomDigit(2),
            ]);
        }
    }
}
