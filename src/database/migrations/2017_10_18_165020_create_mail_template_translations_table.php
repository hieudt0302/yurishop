<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMailTemplateTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mail_template_translations', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('language_id')->unsigned();        
            $table->foreign('language_id')->references('id')->on('languages')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->integer('mail_template_id')->unsigned();        
            $table->foreign('mail_template_id')->references('id')->on('mail_templates')
                ->onUpdate('cascade')->onDelete('cascade');
			$table->text('content')->nullable();

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
        Schema::dropIfExists('mail_template_translations');
    }
}
