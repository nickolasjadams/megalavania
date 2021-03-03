<?php

namespace Database\Seeders;

use Carbon\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        // Run all the seeders.
        $this->call([
            PackageSeeder::class,
            UserSeeder::class,
            B2bBusinessSeeder::class,
            CustomerSeeder::class,
            CategorySeeder::class,
            BrandSeeder::class,
            BrandUserSeeder::class,
        ]);
    }
}
