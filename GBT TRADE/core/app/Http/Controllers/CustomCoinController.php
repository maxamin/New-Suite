<?php

namespace App\Http\Controllers;

use App\Models\CustomCoin;
use Illuminate\Http\Request;

class CustomCoinController extends Controller
{

    public function coinSetting()
    {
        $pageTitle = 'Coin Setting';
        $coin = CustomCoin::first();
        return view('admin.custom_coin.index', compact('pageTitle', 'coin'));
    }
    public function coinSettingUpdate(Request $request)
    {
        $request->validate([
            'name'          => 'required',
            'rate'          => 'required',
            'coin_per_cron' => 'required',
        ]);

        $coin                    = CustomCoin::first();
        $coin->name              = $request->name;
        $coin->rate              = $request->rate;
        $coin->coin_per_cron     = $request->coin_per_cron;
        $coin->notice            = $request->notice;

        $filename = '';
        if($request->image){
            $path = imagePath()['coin']['path'];
            $size = imagePath()['coin']['size'];

            if ($request->hasFile('image')) {
                try {
                    $filename = uploadImage($request->image, $path, $size);
                } catch (\Exception $exp) {
                    $notify = 'Image could not be uploaded!';
                    return response()->json(['msg'=>$notify, 'cls'=>'error']);
                }
            }
            $coin->image = $filename;
        }

        $coin->save();

        $notify = 'Coin setting updated successfully!';
        return response()->json(['msg'=>$notify, 'cls'=>'success', 'img'=> $filename]);

    }
}
