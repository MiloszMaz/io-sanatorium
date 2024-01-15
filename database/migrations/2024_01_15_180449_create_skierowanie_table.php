<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSkierowanieTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skierowanie', function (Blueprint $table) {
            $table->id();
            $table->string('numer_skierowania');
            $table->longText('notatka_z_wywiadu');
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
        Schema::dropIfExists('skierowanie');
    }
}
