<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
            // $table->binary('image')->nullable();
            $table->timestamps();
        });

        // // Blueprint can only set BLOB type (binary)
        // // We need to set it to LONGBLOB for base64 image storage

        // // For non Postgres Databases
        // if (env('DB_CONNECTION') !== 'pgsql') {
        //     DB::statement("ALTER TABLE movies MODIFY image LONGBLOB");
        // }
        // // else {
        // //     DB::statement("ALTER TABLE movies ALTER COLUMN image TYPE BYTEA");
        // // }
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
