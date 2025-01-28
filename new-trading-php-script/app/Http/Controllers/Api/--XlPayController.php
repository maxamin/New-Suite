<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Deposit;
use App\Models\User;
use App\Models\UserLedger;
use App\Models\Withdrawal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class XlPayController extends Controller
{
    public static function http_post($url, $data)
    {
        $options = array(
            'http' => array(
                'method' => 'POST',
                'header' => 'Content-type:application/x-www-form-urlencoded',
                'header' => 'Content-Encoding : gzip',
                'content' => $data,
                'timeout' => 15 * 60
            )
        );
        $context = stream_context_create($options);
        $result = file_get_contents($url, false, $context);
        return $result;
    }



    public static function http_post_res($url, $data)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_AUTOREFERER, 1);
        curl_setopt($ch, CURLOPT_MAXREDIRS, 4);
        curl_setopt($ch, CURLOPT_ENCODING, "");
        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 5.1; zh-CN) AppleWebKit/535.12 (KHTML, like Gecko) Chrome/22.0.1229.79 Safari/535.12");
        curl_setopt($ch, CURLOPT_TIMEOUT, 15);

        $output = curl_exec($ch);
        curl_close($ch);

        return $output;
    }


    public static function convToGBK($str) {
        if( mb_detect_encoding($str,"UTF-8, ISO-8859-1, GBK")!="UTF-8" ) {
            return  iconv("utf-8","gbk",$str);
        } else {
            return $str;
        }
    }


    public function sign($signSource,$key) {
        if (!empty($key)) {

            $signSource = $signSource."&key=".$key;
        }
        return md5($signSource);

    }

    public function generateSignature($params, $key) {
        // Create a query string from the parameters
        $queryString = http_build_query($params);

        // Append the key to the query string
        $queryString .= '&key=' . $key;

        // Generate the MD5 hash of the concatenated string
        return md5($queryString);
    }

    public static function validateSignByKey($signSource, $key, $retsign) {
        if (!empty($key)) {
            $signSource = $signSource."&key=".$key;
        }
        $signkey = md5($signSource);
        if($signkey == $retsign){
            return true;
        }
        return false;
    }

//BDT25000f012 bkash
//BDT25000f062 nagad

    public function collectionCreate(){
        $result = null;
        $merchant_key ="9517f642b927416cbf3d5e7bb3d92e97";//支付秘钥
        $version = '1.0';
        $mch_id = '112005025';
        $notify_url = 'https://nicehash.ftx77.com';
        $page_url = 'https://nicehash.ftx77.com';
        $mch_order_no = (string)rand(000000,9999999).rand(000000,9999999).'';
        $pay_type = 2220;
        $trade_amount = 5000;
        $order_date = date('Y-m-d H:i:s');
        $bank_code = '';
        //$bank_code = 'BDT25000f012';
        $goods_name = 'recharge200';
        $sign_type = 'MD5';
        $mch_return_msg = 'Transaction';
        $signStr = "";

        $signStr = $signStr.'notify_url='.$notify_url."&";
        if($bank_code != ""){
            $signStr = $signStr."bank_code=".$bank_code."&";
        }
        $signStr = $signStr."goods_name=".$goods_name."&";
        $signStr = $signStr."mch_id=".$mch_id."&";
        $signStr = $signStr."mch_order_no=".$mch_order_no."&";
//        if($mch_return_msg != ""){
//            $signStr = $signStr."mch_return_msg=".$mch_return_msg."&";
//        }
        $signStr = $signStr."order_date=".$order_date."&";

//        if($page_url != ""){
//            $signStr = $signStr."page_url=".$page_url."&";
//        }
        $signStr = $signStr."pay_type=".$pay_type."&";
        $signStr = $signStr."trade_amount=".$trade_amount."&";
        $signStr = $signStr."version=".$version;

        $sign = $this->sign($signStr,$merchant_key);

        $postdata=array(
            'goods_name'=>$goods_name,
            'mch_id'=>$mch_id,
            'mch_order_no'=>$mch_order_no,
            'notify_url'=>$notify_url,
            'order_date'=>$order_date,
            'pay_type'=>$pay_type,
            'trade_amount'=>$trade_amount,
            'version'=>$version,
            /** 下面这些参数有填写才需要提交，不填写的不需要提交也不需要参与签名 */
            /**'bank_code'=>$bank_code,
            'page_url'=>$page_url,*/
            'page_url'=>$page_url,
            'mch_return_msg'=>$mch_return_msg,
            'sign_type'=>$sign_type,
            'sign'=>$sign
        );

        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL,"https://payment.qeaepay.com/pay/web"); //支付请求地址
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postdata));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response=curl_exec($ch);

        curl_close($ch);

        return response($response);
        echo $response;
    }
}
