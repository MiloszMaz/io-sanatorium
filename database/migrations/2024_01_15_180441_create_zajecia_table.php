<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateZajeciaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zajecia', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_sali')->references('id')->on('sala');
            $table->foreignId('id_personelu_medycznego')->references('id')->on('personel_medyczny');
            $table->dateTime('data_i_godzina_rozpoczecia');
            $table->dateTime('data_i_godzina_zakonczenia');
            $table->string('nazwa');
            $table->longText('opis');
            $table->foreignId('id_uzytkownika')->references('id')->on('users');
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
        Schema::dropIfExists('zajecia');
    }
}
