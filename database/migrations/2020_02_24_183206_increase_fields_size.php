<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class IncreaseFieldsSize extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->text('location_ar')->change();
            $table->text('location_en')->change();
        });
        Schema::table('services', function (Blueprint $table) {
            $table->text('meta_description_ar')->change();
            $table->text('meta_description_en')->change();
            $table->text('keywords_ar')->change();
            $table->text('keywords_en')->change();
        });
        Schema::table('blogs', function (Blueprint $table) {
            $table->text('meta_description')->change();
            $table->text('keywords')->change();
        });
        Schema::table('pest_libraries', function (Blueprint $table) {
            $table->text('meta_description_ar')->change();
            $table->text('meta_description_en')->change();
            $table->text('keywords_ar')->change();
            $table->text('keywords_en')->change();
        });
        Schema::table('pest_bites', function (Blueprint $table) {
            $table->text('notes_ar')->change();
            $table->text('notes_en')->change();
            $table->text('sting_appearance_ar')->change();
            $table->text('sting_appearance_en')->change();
        });
        Schema::table('faqs', function (Blueprint $table) {
            $table->text('question_ar')->change();
            $table->text('question_en')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
