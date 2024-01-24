<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skierowanie extends Model
{
    protected $table = 'skierowanie';

    public $fillable = [
        'numer_skierowania',
        'notatka_z_wywiadu',
        'id_pacjenta',
        'created_at',
        'updated_at',
    ];
}
