<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroceryListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grocery_lists', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('done')->default(false);
            $table->string('user_id');
            $table->string('flat_id');
            $table->string('date');
            $table->string('uniq_id');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('grocery_lists');
    }
}
