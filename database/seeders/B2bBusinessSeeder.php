<?php

namespace Database\Seeders;

use App\Models\B2bBusiness;
use Illuminate\Database\Seeder;

class B2bBusinessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        B2bBusiness::factory(20)->create();
    }
}
