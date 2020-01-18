<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAboutUsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('about_us', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('description_ar');
            $table->text('description_en');
            $table->text('vision_ar');
            $table->text('vision_en');
            $table->text('goal_ar');
            $table->text('goal_en');
            $table->text('video');
            $table->string('home_title', 255);
            $table->string('home_description', 255);
            $table->text('privacy');
            $table->text('policy');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('about_us');
    }
}
