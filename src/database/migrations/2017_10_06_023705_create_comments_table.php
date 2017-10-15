<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('comment');
            $table->tinyInteger('rate')->default(0)->unsigned();
            $table->string('email');
            $table->string('website')->nullable();
            $table->boolean('approved')->default(true);
            
            $table->integer('parent_id')->nullable()->unsigned();
            $table->foreign('parent_id')->references('id')->on('comments');

            $table->integer('author_id')->nullable()->unsigned();
            $table->foreign('author_id')->references('id')->on('users');
            // ->onUpdate('cascade')->onDelete('cascade');

            $table->integer('commentable_id')->unsigned();
            $table->string('commentable_type');

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
        Schema::dropIfExists('comments');
    }
}
