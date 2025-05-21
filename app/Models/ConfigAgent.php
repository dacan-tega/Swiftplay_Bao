<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConfigAgent extends Model
{
    use HasFactory;

    protected $fillable = [
        "game_name",
        "game_code",
        "agent_id",
        'min_bet',
        'max_bet',
        "bet_size",
        "bet_level",
        "base_bet"
    ];
}
