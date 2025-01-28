<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Purchase;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    
    public function earning()
    {
        $user = \auth()->user();
        $receive_able_total_amount = $user->receive_able_amount;

        $orders = Purchase::where('user_id', $user->id)->get();
        $total_invest = Purchase::where('user_id', $user->id)->sum('amount');
        $total_interest = Purchase::where('user_id', $user->id)->sum('interest');

        return view('app.main.earning', compact('orders', 'receive_able_total_amount', 'total_invest', 'total_interest'));
    }


    public function received_amount()
    {
        $user = Auth::user();
        if ($user->receive_able_amount > 0){

            // Update income
            User::where('id', $user->id)->update([
                'income'=> $user->receive_able_amount + $user->income,
                'receive_able_amount'=> 0
            ]);

            return response()->json(['status'=> true, 'message'=> 'Amount received', 'amount'=> Auth::user()->receive_able_amount]);
            
        }else{
            return response()->json(['status'=> false, 'message'=> 'Nothing to receive', 'amount'=> Auth::user()->receive_able_amount]);
        }
    }


}
