<?php

namespace Slotgen\SlotgenAztec\Models;

use Illuminate\Database\Eloquent\Model;

class AztecSpinLogs extends Model
{
    use UuidAttribute;

    public $table = 'slotgen_aztec_spin_logs';

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
    ];
}
