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
            $table->string('id');
            $table->string('name');
        });

        DB::table('cleaning_rooms')->insert(
            array(
                ['id' => uniqid(), 'name' => 'Küche'],
                ['id' => uniqid(), 'name' => 'FLur'],
                ['id' => uniqid(), 'name' => 'Badezimmer'],
                ['id' => uniqid(), 'name' => 'Toilette'],
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
