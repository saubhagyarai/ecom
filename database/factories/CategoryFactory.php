<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use App\Model;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Category::class, function (Faker $faker) {
    $name = $faker->sentence();
    $slug = Str::slug($name, '-');

    return [
        'name' => $name,
        'slug' => $slug,
        'priority' => $faker->numberBetween(0,10),
        'image' => 'placeholder.jpg'
    ];
});
