<?php

namespace Slotgen\SpaceMan\Models;

use Eloquent as Model;
use Illuminate\Support\Str;

class SimulateSpin extends Model
{
    use UuidAttribute;
    
    public $table = 'slotgen_simulate_spin';

    protected $primaryKey = 'uuid';

    public $fillable = [
        'spin_date',
        'type',
        'session_id',
        'total_bet',
        'total_win',
        'total_spin',
        'is_finished'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
    ];

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->uuid = (string) Str::uuid();
        });
    }

    public const TYPE_NORMAL = 0; // multiply
    public const TYPE_FEATURE = 1; // multiply_auto
}
