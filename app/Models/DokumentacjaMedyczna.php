<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property DateTime $data_wykonania_badania
 * @property string   $notatka
 * @property int      $created_at
 * @property int      $updated_at
 */
class DokumentacjaMedyczna extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'dokumentacja_medyczna';

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
        'data_wykonania_badania', 'notatka', 'id_pacjenta', 'created_at', 'updated_at'
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
        'data_wykonania_badania' => 'datetime', 'notatka' => 'string', 'created_at' => 'timestamp', 'updated_at' => 'timestamp'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'data_wykonania_badania', 'created_at', 'updated_at'
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
