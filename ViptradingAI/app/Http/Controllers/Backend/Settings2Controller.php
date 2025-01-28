<?php

// app/Http/Controllers/Backend/Settings2Controller.php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class Settings2Controller extends Controller
{
    public function index()
    {
        $settings = DB::table('settings2')->first();
        return view('backend.edit.settings2', compact('settings'));
    }

    public function update(Request $request)
    {
        // Tüm form alanlarını al
        $data = $request->except('_token', '_method');

        // settings2 tablosunu güncelle
        DB::table('settings2')->updateOrInsert(
            ['id' => 1], // varsayılan satır
            $data
        );

        return redirect('/admin/settings2')->with('success', 'Ayarlar başarıyla güncellendi.');
    }
}
