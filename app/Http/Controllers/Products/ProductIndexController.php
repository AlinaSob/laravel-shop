<?php

namespace App\Http\Controllers\Products;

use App\Domain\Product\Category;
use App\Domain\Product\City;
use App\Domain\Product\Product;

class ProductIndexController
{
    public function __invoke()
    {
        $args = request()->all();
        if ($args) {
            $productsQuery = Product::query()->filterBy($args);
            $products = $productsQuery->paginate();
        } else {
            $products = Product::paginate();
        }
        $categories = Category::all();
        $cities = City::all();
        return view('products.index', [
            'products' => $products,
            'categories' => $categories,
            'cities' => $cities
        ]);
    }
}
