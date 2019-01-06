<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCleaningRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cleaning_rooms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('flat_id')->nullable();
        });

        DB::table('cleaning_rooms')->insert(
            array(
                ['name' => 'Küche'],
                ['name' => 'FLur'],
                ['name' => 'Badezimmer'],
                ['name' => 'Toilette'],
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cleaning_rooms');
    }
}
