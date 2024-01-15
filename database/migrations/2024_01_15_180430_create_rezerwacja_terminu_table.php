<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRezerwacjaTerminuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rezerwacja_terminu', function (Blueprint $table) {
            $table->id();
            $table->dateTime('data_przyjecia');
            $table->dateTime('data_wypisu');
            $table->text('notatka');
            $table->foreignId('id_pacjenta')->references('id')->on('pacjent');
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
        Schema::dropIfExists('rezerwacja_terminu');
    }
}
