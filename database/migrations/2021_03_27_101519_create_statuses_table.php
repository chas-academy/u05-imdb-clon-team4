<?php

use App\Models\Status;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schema;

class CreateStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('statuses', function (Blueprint $table) {
            $table->id();
            $table->string('status');
            $table->timestamps();
        });

        $pending = Status::where('status', '=', 'pending')->first();
        $public = Status::where('status', '=', 'public')->first();
        $denied = Status::where('status', '=', 'denied')->first();

        if ($pending === null || $public === null || $denied === null) {
            // admin or user doesn't exist
            Artisan::call('db:seed', [
                '--class' => 'StatusSeeder',
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
        Schema::dropIfExists('statuses');
    }
}
