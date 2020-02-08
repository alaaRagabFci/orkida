<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameDescriptionCompanyValuablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('company_valuables', function (Blueprint $table) {
            $table->renameColumn('description_ar', 'desc_ar')->change();
            $table->renameColumn('description_en', 'desc_en')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('company_valuables', function (Blueprint $table) {
            //
        });
    }
}
