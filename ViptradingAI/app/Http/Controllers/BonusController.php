<?php

// app/Http/Controllers/BonusController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class BonusController extends Controller
{
    public function index()
    {
        $bonusData = DB::table('bonus_manager')->get();

        return view('backend.edit.edit', ['bonusData' => $bonusData]);
    }

    public function update(Request $request)
    {
        // Güncelleme işlemini burada gerçekleştirin
        // $request içinde gelen verileri kullanarak bonus_manager tablosunu güncelleyebilirsiniz.

        // Örneğin, her bir satırı güncelleme:
        $count = count($request->input('gift_bonus_amount'));

        for ($i = 0; $i < $count; $i++) {
            $data = [
                'gift_bonus_amount' => $request->input('gift_bonus_amount')[$i],
                'gift_bonus_code' => $request->input('gift_bonus_code')[$i],
                'login_bonus_amount' => $request->input('login_bonus_amount')[$i],
                'login_bonus_code' => $request->input('login_bonus_code')[$i],
                'spin_bonus_amount' => $request->input('spin_bonus_amount')[$i],
                // Diğer sütunlar buraya eklenmeli
            ];

            DB::table('bonus_manager')
                ->where('bonus_id', $i + 1) // Bonus ID'ye göre güncelleme yapılıyor. Burada uygun bir kriter kullanmalısınız.
                ->update($data);
        }

        // Güncelleme işlemi tamamlandıktan sonra başarı mesajını Session'a ekleyelim
        session()->flash('success', 'successfully updated.');

        // Redirect işlemi yapmadan view'i döndürelim
        return view('backend.edit.edit', ['bonusData' => DB::table('bonus_manager')->get()]);
    }
}
