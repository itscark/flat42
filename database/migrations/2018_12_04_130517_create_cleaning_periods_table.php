<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCleaningPeriodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cleaning_periods', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
        });

        DB::table('cleaning_periods')->insert(
            array(
                ['name' => 'Täglich'],
                ['name' => 'Wöchentlich'],
                ['name' => 'Monatlich'],
                ['name' => 'Jährlich'],
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
        Schema::dropIfExists('cleaning_periods');
    }
}
