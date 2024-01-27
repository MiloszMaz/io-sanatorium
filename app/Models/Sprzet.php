<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $numer_seryjny
 * @property string $nazwa
 * @property int    $created_at
 * @property int    $updated_at
 */
class Sprzet extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'sprzet';

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
        'id_sali', 'numer_seryjny', 'nazwa', 'created_at', 'updated_at'
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
        'numer_seryjny' => 'string', 'nazwa' => 'string', 'created_at' => 'timestamp', 'updated_at' => 'timestamp'
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
