<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMetaTagDescriptionPestLibrariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pest_libraries', function (Blueprint $table) {
            $table->renameColumn('meta_title', 'meta_title_ar')->change();
            $table->renameColumn('meta_description', 'meta_description_ar')->change();
            $table->string('meta_title_en', 255);
            $table->string('meta_description_en', 255);
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
