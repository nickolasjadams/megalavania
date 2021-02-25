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
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('business_id');
            $table->foreign('business_id')->references('id')->on('businesses');
            $table->unsignedBigInteger('customer_id');
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->unsignedBigInteger('brand_id');
            $table->foreign('brand_id')->references('id')->on('brands');
            $table->unsignedBigInteger('order_status_id');
            $table->foreign('order_status_id')->references('id')->on('order_statuses');
            $table->decimal('price', 9, 2);
            $table->decimal('deposit', 9, 2)->nullable();
            $table->timestamp('paid_at')->nullable();
            $table->string('initial', 8);
            $table->string('comment', 1000)->nullable();
            $table->string('stock_number')->nullable();
            $table->string('product_name')->nullable();
            $table->boolean('mail_to')->default(true);
            $table->boolean('use_default_mail')->default(true); // if customer wants product sent somewhere other than to their home (if product isn't going to the store)
            $table->string('street'); 
            $table->string('suite');
            $table->string('state');
            $table->string('zip');
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
