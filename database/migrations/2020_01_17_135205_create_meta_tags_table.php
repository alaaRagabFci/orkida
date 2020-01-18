<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMetaTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meta_tags', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tag_ar', 50);
            $table->string('tag_en', 50);
            $table->bigInteger('service_id')->unsigned()->nullable();
            $table->bigInteger('blog_id')->unsigned()->nullable();
            $table->timestamps();
            $table->foreign('service_id')->references('id')
                ->on('services')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('blog_id')->references('id')
                ->on('blogs')
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
        Schema::dropIfExists('meta_tags');
    }
}
