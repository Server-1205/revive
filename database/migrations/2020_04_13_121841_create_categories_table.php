<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCategoriesTable extends Migration
{
    public function up()
    {
        \Schema::create('categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('parent_id')->unsigned()->default(0);
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('slug')->unique()->index();
            $table->softDeletes();
//            $table->foreign('parent_id')->references('id')->on('categories');


            $table->timestamps();
        });
    }

    public function down()
    {
        \Schema::dropIfExists('categories');
    }
}
