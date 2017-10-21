<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInfoPageTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info_page_translations', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('language_id')->unsigned();        
            $table->foreign('language_id')->references('id')->on('languages')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->integer('info_page_id')->unsigned();        
            $table->foreign('info_page_id')->references('id')->on('info_pages')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->text('title')->nullable();
            $table->text('content')->nullable();
            $table->string('description')->nullable();            

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
        Schema::dropIfExists('info_page_translations');
    }
}
