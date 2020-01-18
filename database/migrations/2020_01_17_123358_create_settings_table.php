<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('youtube_url', 255);
            $table->string('facebook_url', 255);
            $table->string('twitter_url', 255);
            $table->string('linkedin_url', 255);
            $table->string('instagram_url', 255);
            $table->string('pinterest_url', 255);
            $table->string('logo', 255);
            $table->string('location_ar', 255);
            $table->string('location_en', 255);
            $table->string('site_email', 100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('settings', function (Blueprint $table) {
            Schema::dropIfExists('settings');
        });
    }
}
