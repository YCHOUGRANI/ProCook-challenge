<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Category;
use App\Model\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'product_name' => $faker->word,
        'product_desc' => $faker->paragraph,
        'category_id' =>  Category::inRandomOrder()->first()->id,
        'product_price' => $faker->randomFloat($nbMaxDecimals = 2, $min = 10, $max = 3000),
    ];
});

//'category_id' =>  function(){
 //   return Category::all()->random();
//}