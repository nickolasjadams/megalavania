<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Create fake customers
     *
     * @return void
     */
    public function run()
    {
        Customer::factory(10)->create();
    }
}
