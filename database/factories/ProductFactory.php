<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Product;
use Faker\Generator as Faker;
use Illuminate\Support\Str as IlluminateStr;

$factory->define(Product::class, function (Faker $faker) {

    $name = $faker->sentence();
    $slug = IlluminateStr::slug($name, '-');
    
    return [
        'name' => $name,
        'slug' => $slug,
        'price' => $faker->numberBetween(100,1000),
        'featured_image'=>'placeholder.jpg',
        // 'stock' => $faker->randomDigit,
        'description' => $faker->paragraph,
    ];
});
