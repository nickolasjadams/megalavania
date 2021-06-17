<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('ticket');
            $table->foreignId('user_id')->constrained();
            $table->foreignId('b2b_business_id')->constrained();
            $table->foreignId('customer_id')->constrained();
            $table->foreignId('product_id')->constrained();
            $table->foreignId('order_status_id')->constrained();
            $table->string('size')->nullable();
            $table->decimal('price', 9, 2);
            $table->decimal('deposit', 9, 2)->nullable();
            $table->timestamp('paid_at')->nullable();
            $table->string('initial', 8);
            $table->string('comment', 1000)->nullable();
            $table->boolean('mail_to')->default(false); // if customer wants the item mailed directly to them
            $table->boolean('use_default_mail')->default(true); // if customer wants product sent somewhere other than to their home (if product isn't going to the store)
            $table->string('street')->nullable(); // street and address fields below are only filled out if customer wants mail sent to different than on file mailing address without updating
            $table->string('suite')->nullable();
            $table->string('state')->nullable();
            $table->string('zip')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
