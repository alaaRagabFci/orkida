<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name_ar', 100);
            $table->string('name_en', 100);
            $table->string('image', 255);
            $table->string('image_title', 255);
            $table->string('image_alt', 255);
            $table->bigInteger('category_id')->unsigned();
            $table->string('phone', 50);
            $table->boolean('sort');
            $table->boolean('is_active');
            $table->integer('home_order');
            $table->string('slug_ar', 255);
            $table->string('slug_en', 255);
            $table->timestamps();
            $table->foreign('category_id')->references('id')
                                                  ->on('categories')
                                                  ->onDelete('cascade')
                                                  ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('services');
    }
}
