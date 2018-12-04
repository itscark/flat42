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
            $table->string('id');
            $table->string('name');
        });

        DB::table('cleaning_days')->insert(
            array(
                ['id' => uniqid(), 'name' => 'Montag'],
                ['id' => uniqid(), 'name' => 'Dienstag'],
                ['id' => uniqid(), 'name' => 'Mittwoch'],
                ['id' => uniqid(), 'name' => 'Donnertag'],
                ['id' => uniqid(), 'name' => 'Fraitag'],
                ['id' => uniqid(), 'name' => 'Samstag'],
                ['id' => uniqid(), 'name' => 'Sonntag']
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
