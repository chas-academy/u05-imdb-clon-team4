<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->date('year');
            $table->text('image')->nullable();
            $table->timestamps();
        });

        // Due to major diferences in mySQL and Postgres type storage in DB we'll use text for Postgres and convert it to LONGBLOB in mySQL

        // For non Postgres Databases
        if (env('DB_CONNECTION') !== 'pgsql') {
            DB::statement("ALTER TABLE movies MODIFY image LONGBLOB");
        }

        // If there is no data in table seed movies from seeder
        $dataInTable = DB::table('movies')->get();
        if (count($dataInTable) === 0) {
            Artisan::call('db:seed', [
                '--class' => 'MovieSeeder',
                // use force for production
                // otherwise it won't execute
                '--force' => true,
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
        Schema::dropIfExists('movies');
    }
}
