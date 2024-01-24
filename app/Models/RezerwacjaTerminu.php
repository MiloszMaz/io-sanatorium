<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Date;

class RezerwacjaTerminu extends Model
{
    use HasFactory;

    protected $table = "rezerwacja_terminu";

    public $fillable = [
        'data_przyjecia',
        'data_wypisu',
        'notatka',
        'id_pacjenta',
        'id_uzytkownika'
    ];

    protected $casts = [
        'data_przyjecia' => 'datetime',
        'data_wypisu' => 'datetime',
    ];

    public function scopeTrwa(Builder $query)
    {
        $teraz = Date::now()->format('Y-m-d');
        $query->where('data_przyjecia', '<=', $teraz)->where('data_wypisu', '>=', $teraz);
    }
}
