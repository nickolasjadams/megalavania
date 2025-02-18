<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('b2b_business_id')->constrained();
            $table->string('first_name', 50);
            $table->string('last_name', 50);
            $table->string('phone', 11);
            $table->string('email')->nullable();
            $table->string('street')->nullable();
            $table->string('suite')->nullable();
            $table->string('state')->nullable();
            $table->string('zip')->nullable();
            $table->boolean('wants_sms')->default(false);
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
        Schema::dropIfExists('customers');
    }
}
