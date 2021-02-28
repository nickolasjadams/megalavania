<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BrandUser;

class BrandUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BrandUser::factory(20)->create();
    }
}
