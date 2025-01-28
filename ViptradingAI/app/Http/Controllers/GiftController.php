<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class GiftController extends Controller
{
    public function updateBalance(Request $request)
    {
        $input = $request->input('message');
        $user = auth()->user();

        // bonus_manager tablosundan gift_bonus_code sütunundaki verileri çek
        $checkinWords = DB::table('bonus_manager')->pluck('gift_bonus_code')->toArray();

        // bonus_manager tablosundan gift_bonus_amount sütunundaki değeri al
        $bonusValue = DB::table('bonus_manager')->value('gift_bonus_amount');

        $usedBonusCodes = json_decode($user->used_bonus_codes, true) ?: [];

        if (in_array($input, $checkinWords) && !in_array($input, $usedBonusCodes)) {
            User::query()->where('id', $user->id)->increment('balance', $bonusValue);

            $usedBonusCodes[] = $input;
            User::query()->where('id', $user->id)->update(['used_bonus_codes' => json_encode($usedBonusCodes)]);

            $successMessage = 'Congratulations! You have received today\'s reward.';
            $message = compact('successMessage');
        } elseif (in_array($input, $usedBonusCodes)) {
            $alreadyUsedMessage = 'You have already used this code.';
            $message = compact('alreadyUsedMessage');
        } else {
            $invalidCodeMessage = 'Invalid bonus code.';
            $message = compact('invalidCodeMessage');
        }

        return view('frontend.extra.giftcode', $message);
    }
}
