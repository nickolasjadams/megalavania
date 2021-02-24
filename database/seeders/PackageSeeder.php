<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PackageSeeder extends Seeder
{
    /**
     * Hardcode the package definitions into the database.
     * - freemium : Visual access. Can modify workflow. Can't create orders.
     * - standard : Can create orders. Lacks premium features.
     * - premium : can send sms alerts to customers.
     * 
     * @return void
     */
    public function run()
    {
        
        // freemium
        DB::table('packages')->insert([
            'name' => 'freemium',
            'description' => 'free version',
            'price' => 0.00,
            'sms_included' => false
        ]);

        // standard
        DB::table('packages')->insert([
            'name' => 'standard',
            'description' => 'standard version',
            'price' => 30.00,
            'sms_included' => false
        ]);

        // premium
        DB::table('packages')->insert([
            'name' => 'premium',
            'description' => 'premium version',
            'price' => 40.00,
            'sms_included' => true
        ]);
    }
}
