<?php

use App\Models\Post;
use Faker\Generator as Faker;
use Illuminate\Support\Carbon;

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Post::class, function (Faker $faker) {
    return [
        'author_id' => rand(1,30),
        'category_id' => rand(1,5),
        'title' => $faker->sentence,
        'slug' => $faker->slug,
        'image' => '/images/no-image.jpg',
        'preview_text' => $faker->text,
        'detail_text' => $faker->paragraph,
        'is_published' => rand(0,1),
        'published_at' => Carbon::now(),
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
        'deleted_at' => null,
    ];
});
