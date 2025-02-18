<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
