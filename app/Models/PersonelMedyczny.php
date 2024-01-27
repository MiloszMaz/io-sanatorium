<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonelMedyczny extends Model
{
    use HasFactory;

    public $table = "personel_medyczny";

    public $fillable = [
        'imie',
        'nazwisko',
        'numer_kontaktowy',
        'stanowisko',
    ];
}
