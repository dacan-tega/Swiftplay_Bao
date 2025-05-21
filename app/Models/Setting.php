<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'settings';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'software_name',
        'software_description',
        'software_favicon',
        'software_logo_white',
        'software_logo_black',
        'currency_code',
        'decimal_format',
        'currency_position',
        'prefix',
        'storage',
        'min_deposit',
        'max_deposit',
        'min_withdrawal',
        'max_withdrawal',
        'language',
        // Percent
        'ngr_percent',
        'revshare_percentage',
        'soccer_percentage',
        'initial_bonus',
        'instagram',
        'discord',
        'telegram',
        'twitter',
        'tiktok',
        'whatsapp',

        'active_gateway',

    ];

    protected $hidden = array('updated_at');
}
