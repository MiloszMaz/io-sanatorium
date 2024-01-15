<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrzypisaniePacjentaDoZajecTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('przypisanie_pacjenta_do_zajec', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_pacjenta')->references('id')->on('pacjent');
            $table->foreignId('id_zajec')->references('id')->on('zajecia');
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
        Schema::dropIfExists('przypisanie_pacjenta_do_zajec');
    }
}
