<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('business_name');
            $table->string('slug')->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('admin_password')->nullable(); // used to access stripe billing portal
            $table->rememberToken();
            $table->string('logo_path')->nullable();
            $table->boolean('godmode')->default(false);
            $table->foreignId('package_id')->constrained();
            $table->string('category_ids')->nullable(); // list of all brand category IDs a business uses (Shoes, Tools, Sports, etc) from the categories table
            $table->timestamps();
        });

        // Nick and Darryl's admin users
        $admins = [
            'nick' => 'nickolas.j.adams@gmail.com',
            'darryl' => 'darrylrhardin@gmail.com'
        ];
        foreach($admins as $admin => $email) {
            DB::table('users')->insert([
                'business_name' => $admin,
                'slug' => Str::slug($admin),
                'logo_path' => '/images/nothing.png',
                'email' => $email,
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'admin_password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10),
                'package_id' => '1',
                'godmode' => true,
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
        Schema::dropIfExists('users');
    }
}
