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

        // Nick and Darryl's admin users
        $admins = ['nickolas.j.adams@gmail.com', 'darrylrhardin@gmail.com'];
        foreach($admins as $admin) {
            DB::table('users')->insert([
                'business_name' => 'megalavania',
                'logo_path' => '/images/nothing.png',
                'email' => $admin,
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'admin_password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10),
                'package_id' => '1',
                'godmode' => true,
            ]);
        }

        // Create 10 fake users
        User::factory(10)->create();
    }
}
