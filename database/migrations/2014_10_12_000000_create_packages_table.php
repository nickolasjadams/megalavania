<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreatePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('description');
            $table->decimal('price', 9, 2);
            $table->boolean('has_sms')->default(false);
            $table->timestamps();
        });

        $packages = [
            'Free' => ['description' => 'Manage orders with limited orders', 'price' => 0.00, 'has_sms' => false],
            'Basic' => ['description' => 'Manage orders with unlimited orders', 'price' => 40.00, 'has_sms' => false],
            'Premium' => ['description' => 'Manage orders with unlimited orders and sms', 'price' => 90.00, 'has_sms' => true]
        ];
        foreach($packages as $package => $detail) {
            DB::table('packages')->insert([
                'name' => $package,
                'description' => $detail['description'],
                'price' => $detail['price'],
                'has_sms' => $detail['has_sms']
            ]);
        }
    }



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('packages');
    }
}
