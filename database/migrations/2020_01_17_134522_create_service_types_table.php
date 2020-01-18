<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiceTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_types', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name_ar', 100);
            $table->string('name_en', 100);
            $table->string('image', 255);
            $table->string('image_title', 255);
            $table->string('image_alt', 255);
            $table->boolean('sort');
            $table->boolean('is_active');
            $table->bigInteger('service_id')->unsigned();
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
        Schema::dropIfExists('service_types');
    }
}
