<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * php artisan db:seed --class=MovieSeeder
     *
     * @return void
     */
    public function run()
    {
        function base64FromFile($fileName)
        {
            $path = "seeder-images/$fileName.jpg";
            $type = pathinfo($path, PATHINFO_EXTENSION);
            $data = file_get_contents($path);
            $base64String = base64_encode($data);
            return "data:image/$type;base64,$base64String";
        }

        $current_timestamp = DB::raw('CURRENT_TIMESTAMP');
        DB::table('movies')->insert([
            [
                'status_id' => 3,
                'title' => 'Raya and the Last Dragon',
                'description' => 'Long ago, in the fantasy world of Kumandra, humans and dragons lived together in harmony. But when an evil force threatened the land, the dragons sacrificed themselves to save humanity. Now, 500 years later, that same evil has returned and it’s up to a lone warrior, Raya, to track down the legendary last dragon to restore the fractured land and its divided people.',
                'year' => '2021-06-03',
                'image' => base64FromFile('raya-2021'),
                'created_at' => $current_timestamp,
                'updated_at' => $current_timestamp,
            ],
            [
                'status_id' => 3,
                'title' => 'Zack Snyder\'s Justice League',
                'description' => 'Determined to ensure Superman\'s ultimate sacrifice was not in vain, Bruce Wayne aligns forces with Diana Prince with plans to recruit a team of metahumans to protect the world from an approaching threat of catastrophic proportions.',
                'year' => '2021-06-03',
                'image' => base64FromFile('justice-league-2021'),
                'created_at' => $current_timestamp,
                'updated_at' => $current_timestamp,
            ],
        ]);
    }
}
