<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditAboutUsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('about_us', function (Blueprint $table) {
            $table->renameColumn('home_title', 'home_title_ar')->change();
            $table->renameColumn('home_description', 'home_description_ar')->change();
            $table->string('home_title_en', 255);
            $table->text('home_description_en');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('about_us', function (Blueprint $table) {
            $table->dropColumn('home_title_en');
            $table->dropColumn('home_description_en');
        });
    }
}
