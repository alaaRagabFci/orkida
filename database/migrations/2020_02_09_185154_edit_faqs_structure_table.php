<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditFaqsStructureTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('faqs', function (Blueprint $table) {
            $table->string('question_ar', 255);
            $table->string('question_en', 255);
            $table->boolean('is_active');
            $table->bigInteger('question_category_id')->unsigned();
            $table->foreign('question_category_id')->references('id')
                                                            ->on('question_categories')
                                                            ->onDelete('cascade')
                                                            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('faqs', function (Blueprint $table) {
            //
        });
    }
}
