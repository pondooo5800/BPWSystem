<?php

use Faker\Generator as Faker;
use App\Product;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence(),
        'code' => $faker->regexify('[A-Z]+[0-9]'),
        'price' => $faker->biasedNumberBetween(5,100),
        'stock' => $faker->biasedNumberBetween(1,20),
        'ctrgory_id' => $faker->biasedNumberBetween(1,2),
        'created_at' => $faker->dateTime($max= 'now'),
        'updated_at' => $faker->dateTime($max= 'now')
    ];
});
