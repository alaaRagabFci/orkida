<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePestLibrariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pest_libraries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name_ar', 100);
            $table->string('name_en', 100);
            $table->string('image', 255);
            $table->string('image_title', 255);
            $table->string('image_alt', 255);
            $table->text('description_ar');
            $table->text('description_en');
            $table->boolean('sort');
            $table->boolean('is_active');
            $table->integer('home_order');
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
        Schema::dropIfExists('pest_libraries');
    }
}
