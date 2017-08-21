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
            $table->decimal('freight1', 12, 2);    				
            $table->decimal('freight2', 12, 2);
            $table->decimal('service', 12, 2);
            $table->decimal('deposit', 12, 2);
            $table->decimal('totalamount', 12, 2);
            $table->tinyInteger('status');


            $table->dateTime('shippeddate');            
            $table->string('shipaddress');
            $table->string('shipdistrict');
            $table->string('shipcity');
            $table->text('shipphone');
            $table->string('note');
            $table->string('feedback');

            $table->integer('user_id')->unsigned();		
            $table->foreign('user_id')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');
                
            $table->timestamps();

            $table->integer('usercreated')->unsigned();
            $table->foreign('usercreated')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');
            
            $table->integer('userupdated')->unsigned();
            $table->foreign('userupdated')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');
            
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('orders');
    }
}
