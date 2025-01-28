<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CheckinType extends Model
{
    use HasFactory;

    public function vip()
    {
        return $this->belongsTo(VipType::class);
    }
}
