<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class ReferralLink extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'referral_program_id'];

    public static function getReferral($user, $program)
    {
        return static::firstOrCreate([
            'user_id' => $user->id,
            'referral_program_id' => $program->id
        ]);
    }

    protected static function boot()
    {
        static::creating(function (ReferralLink $model) {
            $model->generateCode();
        });
        parent::boot();
    }

    private function generateCode()
{
    $characters = 'ABCDEFGHKLMPRT';
    $randomLetters = '';
    $randomNumbers = '';

    // 5 adet random büyük harf oluştur
    for ($i = 0; $i < 5; $i++) {
        $randomLetters .= $characters[rand(0, strlen($characters) - 1)];
    }

    // 2 adet random rakam oluştur
    for ($i = 0; $i < 2; $i++) {
        $randomNumbers .= rand(1, 9);
    }

    // Büyük harfler ve rakamları birleştir
    $this->code = $randomLetters . $randomNumbers;
}



    public function getLinkAttribute()
    {
        return url('') . '/?ref=' . $this->code;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function program()
    {
        // TODO: Check if second argument is required
        return $this->belongsTo(ReferralProgram::class, 'referral_program_id');
    }

    public function relationships()
    {
        return $this->hasMany(ReferralRelationship::class);
    }
}
