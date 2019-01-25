<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use \Illuminate\Support\Facades\DB;

class CreateWelcomesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('welcomes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('section_id');
            $table->text('body');
            $table->text('img_url');
            $table->timestamps();
        });

        DB::table('welcomes')->insert(
            array(
                [
                    'section_id' => 'sectionShopping',
                    'title' => 'Shopping',
                    'body' => 'Führt gemeinsam eine Einkaufsliste. Jeder ist sich immer im klaren was gerade fehlt und was die anderen brauchen. Nie wieder müsst ihr mit knurrendem Magen vor leeren Regalen stehen.',
                    'img_url' => 'svg/homepage/undraw_add_to_cart_vkjp.svg',
                ],

                [
                    'section_id' => 'sectionNews',
                    'title' => 'News',
                    'body' => 'Teilt eure Gedanken miteinander! Gebt euren Freunden bescheid, wo es Angebot gibt.',
                    'img_url' => 'svg/homepage/undraw_content_vbqo.svg',
                ],

                [
                    'section_id' => 'sectionEvents',
                    'title' => 'Events',
                    'body' => 'Gemeinsam ist es immer lustiger! Plant gemeinsame Events... Egal ob ihr zusammen kochen wollt, einen Filmeabend plant, oder zusammen die Stadt unsicher machen wollt.',
                    'img_url' => 'svg/homepage/undraw_having_fun_iais.svg',
                ],

                [
                    'section_id' => 'sectionCleaning',
                    'title' => 'Cleaning',
                    'body' => 'In einer sauberen Wohnung lebt es sich besser! Zusammen haltet ihr eure Wohnung sauber und entscheidet selbst wann was geputzt werden soll.',
                    'img_url' => 'svg/homepage/undraw_schedule_pnbk.svg',
                ],

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
        Schema::dropIfExists('welcomes');
    }
}
