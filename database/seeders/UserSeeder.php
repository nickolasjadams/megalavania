<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Str;
use Carbon\Factory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Hardcode Nick and Darryl's admin users
     * Create fake test users
     *
     * @return void
     */
    public function run()
    {
        // Create 10 fake users
        User::factory(10)->create();
    }
}
