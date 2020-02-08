<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenamePestLibrariesColumnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pest_libraries', function (Blueprint $table) {
            $table->text('meta_title');
            $table->renameColumn('image_title', 'meta_description')->change();
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
            //
        });
    }
}
