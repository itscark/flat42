<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCleaningDaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cleaning_days', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
        });

        DB::table('cleaning_days')->insert(
            array(
                ['name' => 'Montag'],
                ['name' => 'Dienstag'],
                [ 'name' => 'Mittwoch'],
                ['name' => 'Donnertag'],
                ['name' => 'Fraitag'],
                ['name' => 'Samstag'],
                ['name' => 'Sonntag']
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
        Schema::dropIfExists('cleaning_days');
    }
}
