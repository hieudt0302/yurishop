<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('order_no');
            $table->dateTime('order_start_date');
            $table->dateTime('order_end_date')->nullable();

            $table->decimal('order_tax',12,2)->default(0);
            $table->decimal('order_shipping_price',12,2)->default(0);;
            $table->decimal('order_total',12,2)->default(0);;

            $table->integer('customer_id')->unsigned();
            $table->foreign('customer_id')->references('id')->on('users');
            // ->onUpdate('cascade')->onDelete('cascade');

            $table->integer('billing_address_id')->nullable()->unsigned();
            $table->foreign('billing_address_id')->references('id')->on('book_addresses');
            // ->onUpdate('cascade')->onDelete('cascade');

            $table->integer('shipping_address_id')->nullable()->unsigned();
            $table->foreign('shipping_address_id')->references('id')->on('book_addresses');
            // ->onUpdate('cascade')->onDelete('cascade');

            $table->tinyInteger('payment_method')->default(0);
            $table->tinyInteger('shipping_method')->default(0);

            $table->tinyInteger('order_status')->default(0);
            $table->tinyInteger('payment_status')->default(0);
            $table->tinyInteger('shipping_status')->default(0);

            $table->text('note')->nullable();

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
        Schema::dropIfExists('orders');
    }
}
