<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Pacjent extends Model
{
    use HasFactory;

    protected $table = 'pacjent';

    public $fillable = [
        'imie',
        'nazwisko',
        'pesel',
        'numer_kontaktowy_opiekuna',
    ];

    public function pobyt(): HasOne
    {
        return $this->hasOne(RezerwacjaTerminu::class, 'id_pacjenta')->trwa();
    }
}
