<?php

namespace Database\Seeders;

use App\Domain\Product\Category;
use App\Domain\Product\City;
use App\Domain\Product\Product;
use Illuminate\Database\Seeder;

class FilterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $cities = City::factory(30)->create();
        $categories = Category::factory(100)->create();

        Product::factory(50000)
            ->create()
            ->each(function (Product $product) use ($cities, $categories) {
                $product->cities()->attach($cities->random(1)[0]);
                $product->categories()->attach($categories->random(1)[0]);
                $product->save();
            });
    }
}
