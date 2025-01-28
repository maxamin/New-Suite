<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CryptoWallet extends Model
{
    use HasFactory;

    public function bank()
    {
        return $this->belongsTo(BankList::class, 'network', 'bank_code');
    }
}
