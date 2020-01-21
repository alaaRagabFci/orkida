<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveTagArEnTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('meta_tags', function (Blueprint $table) {
            $table->dropColumn('tag_ar');
            $table->dropColumn('tag_en');
            $table->string('tag', 50);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('meta_tags', function (Blueprint $table) {
            $table->string('tag_ar', 50);
            $table->string('tag_en', 50);
            $table->dropColumn('tag');
        });
    }
}
