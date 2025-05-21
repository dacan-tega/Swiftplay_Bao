<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionQrcode extends Model
{
    use HasFactory;

    protected $table = 'transaction_qrcode';

    protected $fillable = [
        'user_id',
        'mode',
        'qr_data',
        'status',
        'scanned_at',
        'amount',
    ];
}