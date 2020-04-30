<?php

use App\Models\Comment;
use Faker\Generator as Faker;
use Illuminate\Support\Carbon;

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Comment::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'comment' => $faker->text,
        'status' => 0,
        'ip' => $faker->ipv4,
        'reply_id' => rand(1,10),
        'post_id' => function(){
            return factory(\App\Models\Post::class)->create()->id;
        },
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
    ];
});
