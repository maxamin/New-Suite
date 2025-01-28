<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'transaction_id',
        'user_id',
        'method_name',
        'order_id',
        'amount',
        'final_amount',
        'date',
        'status',
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
