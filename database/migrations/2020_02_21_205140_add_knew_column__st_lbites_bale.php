<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddKnewColumnStLbitesBale extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pest_bites', function (Blueprint $table) {
            $table->string('sting_appearance_ar', 255);
            $table->string('sting_appearance_en', 255);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pest_bites', function (Blueprint $table) {
            $table->dropColumn('sting_appearance_ar');
            $table->dropColumn('sting_appearance_en');
        });
    }
}
