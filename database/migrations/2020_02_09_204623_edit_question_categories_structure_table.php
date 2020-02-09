<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditQuestionCategoriesStructureTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('question_categories', function (Blueprint $table) {
            $table->renameColumn('category', 'category_ar')->change();
            $table->string('category_en', 255);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('question_categories', function (Blueprint $table) {
            //
        });
    }
}
