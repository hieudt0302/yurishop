<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeOrdersColumnDefaultValue extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function ($table) {
            $table->integer('payment_method')->default(1)->change();
            $table->integer('shipping_method')->default(1)->change();

            $table->integer('order_status')->default(1)->change();
            $table->integer('payment_status')->default(1)->change();
            $table->integer('shipping_status')->default(1)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
