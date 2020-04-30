<?php

use App\Models\Category;
use Faker\Generator as Faker;
use Illuminate\Support\Carbon;

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Category::class, function (Faker $faker) {
    return [
        'title' => $faker->word,
        'description' => $faker->text,
        'slug' => $faker->slug,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
        'parent_id' => $faker->randomNumber(),
        'deleted_at' => $faker->word,
    ];
});
