<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pacjent extends Model
{
    protected $table = 'pacjent';

    public $imie;

    public $nazwisko;

    public $pesel;

    public $numer_kontaktowy_opiekuna;
}
