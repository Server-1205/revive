<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\User::class, 10)->create();
        $this->call(CategoriesTableSeeder::class);
        factory(\App\Models\Post::class, 10)->create();
        factory(\App\Models\Comment::class, 10)->create();

    }
}
