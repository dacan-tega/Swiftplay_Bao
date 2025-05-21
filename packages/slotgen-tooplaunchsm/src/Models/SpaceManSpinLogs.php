<?php

namespace Slotgen\SpaceMan\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpaceManSpinLogs extends Model
{
    use UuidAttribute;

    public $table = 'slotgen_spaceman_spinlogs';
    
    protected $primaryKey = 'uuid';

    public $fillable = [
        'credit',
        'total_bet',
        'win_amount',
        'step',
        'transaction',
        'player_id',
        'player_pos',
        'pos'
    ];

    protected $casts = [
        'credit' => 'decimal:2',
        'total_bet' => 'decimal:2',
        'win_amount' => 'decimal:2',
        'step' => 'integer',
        'transaction' => 'string',
        'player_id' => 'string',
        'player_pos' => 'integer',
        'pos' => 'integer',
    ];
}
