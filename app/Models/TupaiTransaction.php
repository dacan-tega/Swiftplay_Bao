<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string $id
 * @property string $agents_id
 * @property string $tupai_member_id
 * @property string $time
 * @property string $game_code
 * @property string $round_id
 * @property string $bet_amount
 * @property string $win_amount
 * @property string $history_code
 */
class TupaiTransaction extends Model
{
    use HasFactory;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tupai_transaction';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id' ,
        'agents_id' ,
        'tupai_member_id' ,
        'time' ,
        'game_code' ,
        'round_id' ,
        'bet_amount' ,
        'win_amount' ,
        'history_code', 
    ];
}
