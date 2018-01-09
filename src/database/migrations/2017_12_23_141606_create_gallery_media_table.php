<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGalleryMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gallery_media', function (Blueprint $table) {
            $table->integer('gallery_id')->unsigned();
            $table->integer('media_id')->unsigned();

            $table->foreign('gallery_id')->references('id')->on('galleries')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('media_id')->references('id')->on('medias')
                ->onUpdate('cascade')->onDelete('cascade');
                
            $table->integer('order')->default(0)->unsigned();
            $table->primary(['gallery_id', 'media_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gallery_media');
    }
}
