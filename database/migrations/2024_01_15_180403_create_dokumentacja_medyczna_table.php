<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDokumentacjaMedycznaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dokumentacja_medyczna', function (Blueprint $table) {
            $table->id();
            $table->dateTime('data_wykonania_badania');
            $table->longText('notatka');
            $table->foreignId('id_pacjenta')->references('id')->on('pacjent');
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
        Schema::dropIfExists('dokumentacja_medyczna');
    }
}
