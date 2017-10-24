<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username'); 
            $table->string('first_name'); 
            $table->string('last_name'); 
            $table->text('avatar')->nullable(); 
            $table->boolean('gender')->default(false); 
            $table->date('date_of_birth')->nullable();
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->string('company')->nullable();
            $table->string('vat')->nullable();
            $table->boolean('newsletter')->default(false); 
            $table->string('password');
            $table->rememberToken();   
            $table->boolean('activated')->default(true); 
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
        Schema::dropIfExists('users');
    }
}
