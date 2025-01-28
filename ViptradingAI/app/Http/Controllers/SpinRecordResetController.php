<?php

// app/Http/Controllers/SpinRecordResetController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SpinRecordResetController extends Controller
{
    public function resetSpinRecord()
    {
        $randomNumbers = $this->generateRandomNumbers(15);

        DB::table('users')->update(['spin_record' => json_encode($randomNumbers)]);

        return redirect()->back()->with('success', 'Spin Record reset success.');
    }

    private function generateRandomNumbers($count)
    {
        $randomNumbers = [];
        for ($i = 0; $i < $count; $i++) {
            $randomNumbers[] = mt_rand(1, 99); // 1 ile 99 arasında rastgele rakamlar
        }

        return $randomNumbers;
    }
}
