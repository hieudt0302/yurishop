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
            $table->tinyInteger('payment_method')->default(1);
            $table->tinyInteger('shipping_method')->default(1);

            $table->tinyInteger('order_status')->default(1);
            $table->tinyInteger('payment_status')->default(1);
            $table->tinyInteger('shipping_status')->default(1);
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
