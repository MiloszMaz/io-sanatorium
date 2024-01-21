<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skierowanie extends Model
{
    protected $table = 'skierowanie';

    public $numer_skierowania;
    public $notatka_z_wywiadu;
    public $id_pacjenta;
    public $created_at;
    public $updated_at;
}
