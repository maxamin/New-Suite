<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class DailyBonusController extends Controller
{
    public function claimBonus()
    {
        $user = Auth::user();

        // bonus_manager tablosundan login_bonus_code sütunundaki verileri çek
        $words = DB::table('bonus_manager')->pluck('login_bonus_code')->toArray();

        // bonus_manager tablosundan login_bonus_amount sütunundaki değeri al
        $balance = DB::table('bonus_manager')->value('login_bonus_amount');

        // Kullanıcının daha önce bonus aldığı kelime
        $lastBonusWord = $user->last_bonus_word;

        // Kullanıcının daha önce bonus aldığı kelime listede var mı?
        if (in_array($lastBonusWord, $words)) {
            $message = "Check-in Already Done This Day.";
            $messageType = 'error'; // Bonus alınamadığı durumu
        } else {
            // Rastgele bir kelime seç
            $randomWord = $words[array_rand($words)];

            // Kullanıcıya bonus verme işlemini buraya ekleyebilirsiniz (örneğin, balance'ı artırma)
            User::query()->where('id', $user->id)->increment('balance', $balance);

            // Kullanıcının son bonus aldığı kelimeyi güncelle
            User::query()->where('id', $user->id)->update(['last_bonus_word' => $randomWord]);

            // Başarılı bir şekilde bonus alındığına dair bir mesaj oluştur
            $message = "Congratulations, Login Bonus has been successfully received. Earning: " . $balance . "$";
            $messageType = 'success'; // Bonus alındığı durumu
        }

        // Mesajı session'a ekleyerek blade dosyasında görüntülenebilir hale getir
        session()->flash($messageType . 'Message', $message);

        // Blade dosyasına yönlendir
        return view('frontend.extra.checkin');
    }
}
