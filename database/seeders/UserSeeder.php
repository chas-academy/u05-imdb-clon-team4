<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * php artisan db:seed --class=UserSeeder
     *
     * @return void
     */
    public function run()
    {
        /**
         * Set up initial users (admin + standard user).
         *
         */

        $current_timestamp = DB::raw('CURRENT_TIMESTAMP');
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

        /**
         * Add initial roles and permissions.
         *
         */

        DB::table('roles')->insert([
            [
                'name' => 'admin',
                'guard_name' => 'web',
            ],
            [
                'name' => 'user',
                'guard_name' => 'web',
            ],
        ]);

        DB::table('permissions')->insert([
            [
                'name' => 'admin',
                'guard_name' => 'web',
            ],
            [
                'name' => 'user',
                'guard_name' => 'web',
            ],
        ]);

        DB::table('role_has_permissions')->insert([
            [
                'permission_id' => 1,
                'role_id' => 1,
            ],
            [
                'permission_id' => 2,
                'role_id' => 2,
            ],
        ]);

        DB::table('model_has_roles')->insert([
            [
                'role_id' => 1,
                'model_type' => 'App\Models\User',
                'model_id' => 1,
            ],
            [
                'role_id' => 2,
                'model_type' => 'App\Models\User',
                'model_id' => 2,
            ],
        ]);
    }
}
