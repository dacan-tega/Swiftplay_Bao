<?php

namespace Slotgen\SlotgenAztec\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SlotgenAztecConfig extends Model
{
    use HasFactory;

    protected $table = 'slotgen_aztec_configs';

    protected $fillable = [
        'win_ratio',
        'feature_ratio',
        'feature_winvalue',
        'system_rtp',
        'use_rtp',
        'bet_size',
        'bet_level',
        'base_bet',
        'max_bet',
        'game_name',
        'sign_feature_spin',
        'sign_feature_credit',
        'sign_bonus',
        'jackpot_value',
        'jackpot_win_ratio',
        'jackpot_return_value_ratio'
    ];
}
