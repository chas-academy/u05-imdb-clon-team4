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
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        /**
         * Set up initial users (admin + standard user).
         *
         */

        $current_timestamp = \DB::raw('CURRENT_TIMESTAMP');
        DB::table('users')->insert([
            [
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'password' => Hash::make('secret'),
                'created_at' => $current_timestamp,
                'updated_at' => $current_timestamp,
            ],
            [
                'name' => 'User',
                'email' => 'user@user.com',
                'password' => Hash::make('secret'),
                'created_at' => $current_timestamp,
                'updated_at' => $current_timestamp,
            ],
        ]);
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
