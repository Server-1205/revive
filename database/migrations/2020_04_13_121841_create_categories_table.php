<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCategoriesTable extends Migration
{
    public function up()
    {
        \Schema::create('categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('parent_id')->unsigned()->default(1);
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('slug')->unique()->index();
            $table->softDeletes();


            $table->timestamps();
        });
    }

    public function down()
    {
        \Schema::dropIfExists('categories');
    }
}
