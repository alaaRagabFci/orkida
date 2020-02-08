<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditFaqsColumnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('faqs', function (Blueprint $table) {
            $table->renameColumn('question_ar', 'faq_ar')->change();
            $table->renameColumn('question_en', 'faq_en')->change();
            $table->dropColumn('answer_ar');
            $table->dropColumn('answer_en');
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
            $table->text('answer_ar');
            $table->text('answer_en');
            $table->renameColumn('faq_ar', 'question_ar')->change();
            $table->renameColumn('faq_en', 'question_en')->change();
        });
    }
}
