<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('status_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('movie_id');
            $table->string('title');
            $table->text('description');
            $table->timestamps();
        });

        $dataInTable = DB::table('reviews')->get();
        if (count($dataInTable) === 0) {
            Artisan::call('db:seed', [
                '--class' => 'ReviewSeeder',
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
        Schema::dropIfExists('reviews');
    }
}
