<?php

namespace Slotgen\SlotgenFortuneDragon\Models;

use Illuminate\Database\Eloquent\Model;

class FortuneDragonSpinLogs extends Model
{
    use UuidAttribute;

    public $table = 'slotgen_fortune_dragon_spin_logs';

    protected $primaryKey = 'uuid';

    public $fillable = [
        'free_num',
        'num_line',
        'betamount',
        'balance',
        'credit_line',
        'total_bet',
        'win_amount',
        'active_icons',
        'active_lines',
        'icon_data',
        'spin_ip',
        'multipy',
        'win_log',
        'transaction_id',
        'drop_line',
        'total_way',
        'first_drop',
        'is_free_spin',
        'parent_id',
        'drop_normal',
        'drop_feature',
        'mini_win',
        'mini_result',
        'multiple_list',
        'player_id',
        'rtp_file',
        'rtp_index',
        'rtp_key',
        'result_json',
    ];

    protected $casts = [
        'credit' => 'decimal:2',
        'total_bet' => 'decimal:2',
        'win_amount' => 'decimal:2',
        'win_multi' => 'decimal:2',
        'result' => 'string',
        'parent_id' => 'string',
        'result_json' => 'json',
        'total_multi' => 'integer',
    ];
}
