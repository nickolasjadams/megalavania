<?php

namespace Database\Seeders;

use App\Models\B2bBusiness;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class B2bBusinessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // // Nick and Darryl's admin users
        // $users = User::all();

        // foreach($users as $user) {
        //     DB::table('b2b_businesses')->insert([
        //         'name' => $admin,
        //         'slug' => Str::slug($admin),
        //         'logo_path' => '/images/nothing.png',
        //         'email' => $email,
        //         'email_verified_at' => now(),
        //         'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        //         'admin_password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        //         'remember_token' => Str::random(10),
        //         'package_id' => '1',
        //         'godmode' => true,
        //     ]);
        // }
        B2bBusiness::factory(20)->create();
    }
}
