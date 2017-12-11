<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('product_id')->unsigned();
            $table->foreign('product_id')->references('id')->on('products');
            // ->onUpdate('cascade')->onDelete('cascade');

            $table->integer('order_id')->unsigned();
            $table->foreign('order_id')->references('id')->on('orders');
            // ->onUpdate('cascade')->onDelete('cascade');

            $table->decimal('price',12,0);
            $table->integer('quantity')->default(0);
            $table->decimal('discount',12,0);
            $table->decimal('total',12,0);

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
        Schema::dropIfExists('order_details');
    }
}
