<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePostsTable extends Migration
{
    public function up(): void
    {
        \Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('author_id')->unsigned();
            $table->bigInteger('category_id')->unsigned();
            $table->string('title', 50);
            $table->string('slug', 50)->unique();
            $table->string('image')->nullable();
            $table->text('preview_text')->nullable();
            $table->text('detail_text')->nullable();
            $table->boolean('is_published')->default(false);
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        \Schema::dropIfExists('posts');
    }
}
