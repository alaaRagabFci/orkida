<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSlugFieldPestLibrariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pest_libraries', function (Blueprint $table) {
            $table->string('slug_ar', 255);
            $table->string('slug_en', 255);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pest_libraries', function (Blueprint $table) {
            $table->dropColumn('slug_ar');
            $table->dropColumn('slug_en');
        });
    }
}
