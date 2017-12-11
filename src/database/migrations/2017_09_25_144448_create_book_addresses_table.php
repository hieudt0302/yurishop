<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_addresses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('company')->nullable();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('address1');
            $table->string('address2')->nullable();
            $table->string('district',50)->nullable();
            $table->string('city',50);
            $table->string('country',50);
            $table->string('state_province')->nullable();
            $table->string('zipcode')->nullable();
            $table->string('phone',20);
            $table->string('fax',20)->nullable();
            $table->string('email')->nullable();

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            // ->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('book_addresses');
    }
}
