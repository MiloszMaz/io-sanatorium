<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $imie
 * @property string $nazwisko
 * @property string $numer_kontaktowy
 * @property string $stanowisko
 * @property int    $created_at
 * @property int    $updated_at
 */
class PersonelMedyczny extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'personel_medyczny';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'imie', 'nazwisko', 'numer_kontaktowy', 'stanowisko', 'created_at', 'updated_at'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'imie' => 'string', 'nazwisko' => 'string', 'numer_kontaktowy' => 'string', 'stanowisko' => 'string', 'created_at' => 'timestamp', 'updated_at' => 'timestamp'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at', 'updated_at'
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var boolean
     */
    public $timestamps = false;

    // Scopes...

    // Functions ...

    // Relations ...
}