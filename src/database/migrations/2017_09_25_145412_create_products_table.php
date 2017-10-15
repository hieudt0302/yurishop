<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sku')->nullable();
            $table->string('name');
            $table->string('slug');
            $table->decimal('old_price')->default(0)->unsigned();
            $table->decimal('price')->default(0)->unsigned();
            $table->decimal('special_price')->default(0)->unsigned();
            $table->dateTime('special_price_start_date')->nullable();
            $table->dateTime('special_price_end_date')->nullable();
            $table->boolean('disable_buy_button')->default(false);
            $table->boolean('disable_wishlist_button')->default(false);
            $table->boolean('call_for_price')->default(false);
            $table->boolean('sold_off')->default(false);
            $table->integer('minimum_amount')->default(1); //Mini can order
            $table->integer('maximum_amount')->nullable(); //Max can order
            $table->boolean('published')->default(true);

            $table->integer('category_id')->nullable()->unsigned();
            $table->foreign('category_id')->references('id')->on('categories');

            $table->integer('author_id')->unsigned();
            $table->foreign('author_id')->references('id')->on('users');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
