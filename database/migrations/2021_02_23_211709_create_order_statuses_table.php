<?php

use App\Models\OrderStatus;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_statuses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->string('name');
            $table->integer('position');
            $table->timestamps();
        });
        $user = User::find(1);
        $statuses = ['New Order', 'Pending Order', 'Ordered', 'Received in Store', 'Delivered to Customer'];
        foreach($statuses as $pos => $status)
        {
            $newStatus = new OrderStatus;
            $newStatus->user_id = $user->id;
            $newStatus->name = $status;
            $newStatus->position = $pos+1;
            $newStatus->save();
            $newStatus = null;
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_statuses');
    }
}
