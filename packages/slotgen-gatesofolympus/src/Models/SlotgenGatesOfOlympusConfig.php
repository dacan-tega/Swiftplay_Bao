<?php

namespace Slotgen\SlotgenGatesOfOlympus\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SlotgenGatesOfOlympusConfig extends Model
{
    use HasFactory;

    protected $table = 'slotgen_gates_of_olympus_configs';

    protected $fillable = [
        'win_ratio',
        'feature_ratio',
        'feature_winvalue',
        'system_rtp',
        'use_rtp',
        'game_name',
        'sign_feature_spin',
        'sign_feature_credit',
        'sign_bonus',
        'jackpot_value',
        'jackpot_win_ratio',
        'jackpot_return_value_ratio',
        'bet_size',
        'bet_level',
        'base_bet',
        'max_bet',
        'currency',
        'currency_prefix',
        'currency_suffix',
        'currency_thousand',
        'currency_decimal',
        'value_buy_feature',
    ];
}
