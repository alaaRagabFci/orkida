<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 100);
            $table->string('image', 255);
            $table->string('image_title', 255);
            $table->string('image_alt', 255);
            $table->bigInteger('service_id')->unsigned();
            $table->text('description');
            $table->boolean('sort');
            $table->boolean('is_active');
            $table->string('slug_ar', 255);
            $table->string('slug_en', 255);
            $table->integer('viewers');
            $table->timestamps();
            $table->foreign('service_id')->references('id')
                ->on('services')
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
        Schema::dropIfExists('blogs');
    }
}
