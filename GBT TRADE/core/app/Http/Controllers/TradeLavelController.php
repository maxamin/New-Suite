<?php

namespace App\Http\Controllers;

use App\Models\TradeLevel;
use Illuminate\Http\Request;

class TradeLavelController extends Controller
{
    public function index(){
        $pageTitle = "Trade Levels";
        $trade_lavels = TradeLevel::get();
        $emptyMessage = 'Data Not Found!';
        return view('admin.trade.index', compact('trade_lavels', 'emptyMessage', 'pageTitle'));
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'min' => 'required|numeric',
            'max' => 'required|numeric',
            'profit' => 'required|numeric',
            'type' => 'required',
        ]);

        if($request->id){
            $level = TradeLevel::find($request->id);
            $msg = 'Level Updated SuccessFully!';
        }else {
            $level = new TradeLevel();
            $msg = 'Level Add SuccessFully!';
        }

        $level->name = $request->name;
        $level->min = $request->min;
        $level->max = $request->max;
        $level->profit = $request->profit;
        $level->type = $request->type;
        $level->save();


        return response()->json(['msg'=>$msg, 'cls'=>'success']);
    }
}
