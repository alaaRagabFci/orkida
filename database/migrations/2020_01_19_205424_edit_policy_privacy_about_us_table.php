<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditPolicyPrivacyAboutUsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('about_us', function (Blueprint $table) {
            $table->renameColumn('privacy', 'privacy_ar')->change();
            $table->renameColumn('policy', 'policy_ar')->change();
            $table->text('privacy_en');
            $table->text('policy_en');
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
            $table->dropColumn('privacy_en');
            $table->dropColumn('policy_en');
        });
    }
}
