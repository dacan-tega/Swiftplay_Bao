<?php

namespace Slotgen\SlotgenFortuneDragon\Models;

use Illuminate\Database\Eloquent\Model;

class FortuneDragonPlayer extends Model
{
    use UuidAttribute;

    public $table = 'slotgen_fortune_dragon_players';

    protected $primaryKey = 'uuid';

    public $fillable = [
        'credit',
        'client_ip',
        'device_info',
        'player_uuid',
        'last_login',
        'user_name',
        'session_data',
        'is_seamless',
        'previous_session',
        'game_state',
        'nextrun_feature',
        'return_feature',
        'return_normal',
        'agent_id',
        'agent_id',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'credit' => 'decimal:2',
        'client_ip' => 'string',
        'device_info' => 'string',
        'last_login' => 'datetime',
        'session_data' => 'json',
        'previous_session',
        'game_state',
        'nextrun_feature' => 'decimal:2',
        'return_feature' => 'decimal:2',
        'return_normal' => 'decimal:2',

    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'session_data' => 'required',
        'credit' => 'required',
        'game_state' => 'object',
        'previous_session' => 'boolean',
    ];
}
