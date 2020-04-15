<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCommentsTable extends Migration
{
    public function up(): void
    {
        \Schema::create('comments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 20);
            $table->string('email', 30);
            $table->boolean('status');
            $table->bigInteger('post_id')->unsigned()->index();
            $table->integer('reply_id')->nullable();
            $table->text('comment');
            $table->string('ip', 20);
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        \Schema::dropIfExists('comments');
    }
}
