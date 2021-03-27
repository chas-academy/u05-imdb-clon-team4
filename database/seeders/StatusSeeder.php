<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * php artisan db:seed --class=StatusSeeder
     *
     * @return void
     */
    public function run()
    {
        $current_timestamp = DB::raw('CURRENT_TIMESTAMP');
        DB::table('statuses')->insert([
            [
                'status' => 'pending',
            ],
            [
                'status' => 'draft',
            ],
            [
                'status' => 'published',
            ],
            [
                'status' => 'denied',
            ],
        ]);
    }
}
