<?php

namespace Laramin\Utility\Controller;

use App\Http\Controllers\Controller;
use App\Lib\CurlRequest;
use App\Models\GeneralSetting;
use Illuminate\Http\Request;
use Laramin\Utility\VugiChugi;

class UtilityController extends Controller{

    public function laraminStart()
    {
        $pageTitle = VugiChugi::lsTitle();
        return view('Utility::laramin_start',compact('pageTitle'));
    }

    public function laraminSubmit(Request $request){
        $param['code'] = $request->purchase_code;
        $param['url'] = self::url();
        $param['product'] = 'gptcoin';
        $reqRoute = VugiChugi::lcLabSbm();
        $response = CurlRequest::curlPostContent($reqRoute, $param);
        $response = json_decode($response);

        if ($response->error == 'error') {
            return response()->json(['type'=>'error','message'=>$response->message]);
        }

        $env = $_ENV;
        $env['PURCHASECODE'] = $request->purchase_code;
        $env['APP_URL'] = self::url();
$envString = '';
        foreach($env as $k => $en){
$envString .= $k.'='.$en.'
';
        }

        $envLocation = $response->location;
        $envFile = fopen($envLocation, "w");
        fwrite($envFile, $envString);
        fclose($envFile);

        $laramin = fopen(dirname(__DIR__).'/laramin.json', "w");
        $txt = '{
    "purchase_code":'.'"'.$request->purchase_code.'",'.'
    "installcode":'.'"'.@$response->installcode.'",'.'
    "license_type":'.'"'.@$response->license_type.'"'.'
}';
        fwrite($laramin, $txt);
        fclose($laramin);

        $general = GeneralSetting::first();
        $general->maintenance_mode = 0;
        $general->save();

        return response()->json(['type'=>'success']);

    }
    
    public static function url(){
        $current = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        $url = substr($current, 0, -22);
        return  $url;
    }
}