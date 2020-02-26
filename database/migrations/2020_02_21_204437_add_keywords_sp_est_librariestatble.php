<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddKeywordsSpEstLibrariestatble extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pest_libraries', function (Blueprint $table) {
            $table->string('keywords_ar', 255);
            $table->string('keywords_en', 255);
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
            $table->dropColumn('keywords_ar');
            $table->dropColumn('keywords_en');
        });
    }
}
