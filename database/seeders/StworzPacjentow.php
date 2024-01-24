<?php

namespace Database\Seeders;

use App\Models\Pacjent;
use Illuminate\Database\Seeder;

class StworzPacjentow extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pacjent::factory()->count(150)->create();
    }
}
