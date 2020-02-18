<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePestBitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pest_bites', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('image', 255);
            $table->string('pest_type_ar', 255);
            $table->string('pest_type_en', 255);
            $table->text('insect_bites_ar');
            $table->text('insect_bites_en');
            $table->string('notes_ar', 255);
            $table->string('notes_en', 255);
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
        Schema::dropIfExists('pest_bites');
    }
}
