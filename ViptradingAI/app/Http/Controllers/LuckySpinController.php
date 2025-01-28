<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class LuckySpinController extends Controller
{
    public function addToBalance(Request $request)
    {
        // Kullanıcının daha önce bonus alıp almadığını kontrol et
        $user_id = auth()->user()->id;
        $user = DB::table('users')->where('id', $user_id)->first();

        if (!$user) {
            return View::make('frontend.extra.luckyspin', ['error' => 'Kullanıcı bulunamadı']);
        }

        // spin_record ve spin_record2 sütunlarındaki değerleri al
        $spinRecord = $user->spin_record;
        $spinRecord2 = $user->spin_record2;

        // Eğer spin_record'daki kelime spin_record2'de varsa tekrar bonus verme
        if ($spinRecord && $spinRecord2 && strpos($spinRecord2, $spinRecord) !== false) {
            return View::make('frontend.extra.luckyspin', ['error' => 'You have already used your right today']);
        }

        // Rastgele bir miktar seç
        $amount = $this->getRandomAmountFromDatabase();

        // $amount'ı float türüne dönüştür
        $amount = floatval($amount);

        // Belirli miktarı balance'e ekle
        $newBalance = $user->balance + $amount;

        // Yeni bakiyeyi veritabanına kaydet
        DB::table('users')->where('id', $user_id)->update(['balance' => $newBalance, 'spin_record' => 'hasa']);

        // Kullanılan kelimeleri spin_record2 sütununa ekleyerek, daha önce alınmış bonusların takibini yapabilirsiniz.
        $usedWords = $spinRecord2 ? $spinRecord2 . ' hasa' : 'hasa';
        DB::table('users')->where('id', $user_id)->update(['spin_record2' => $usedWords]);

        // Başarılı işlem durumunda blade sayfasına yönlendirme
        return View::make('frontend.extra.luckyspin', ['success' => 'Congratulations You Win', 'amount' => $amount]);
    }

    private function getRandomAmountFromDatabase()
    {
        // bonus_manager tablosundan rastgele bir kayıt seç
        $bonusRecord = DB::table('bonus_manager')->inRandomOrder()->first();

        if (!$bonusRecord) {
            return 0; // Bonus kaydı yoksa varsayılan değeri kullanabilirsiniz
        }

        // spin_bonus_amount sütunundaki değeri seç ve tek tırnakları kaldır
        $amountsString = str_replace(['\'', ' '], '', $bonusRecord->spin_bonus_amount);

        // Virgülle ayrılmış stringi diziye çevir
        $amounts = explode(',', $amountsString);

        // Rastgele bir miktar seç
        $randomAmount = $amounts[array_rand($amounts)];

        return $randomAmount ?? 0;
    }
}
