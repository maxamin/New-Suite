<?php

use Carbon\Carbon;
use App\Lib\Captcha;
use App\Models\User;
use App\Notify\Notify;
use App\Lib\ClientInfo;
use App\Models\Deposit;
use App\Lib\CurlRequest;
use App\Lib\FileManager;
use App\Models\Frontend;
use App\Models\Referral;
use App\Models\Extension;
use App\Models\Transaction;
use Illuminate\Support\Str;
use App\Models\CommissionLog;
use App\Models\GeneralSetting;
use App\Lib\GoogleAuthenticator;
use Illuminate\Support\Facades\Cache;
use Intervention\Image\Facades\Image;

function systemDetails()
{
    $system['name'] = 'myTask';
    $system['version'] = '3.4';
    $system['build_version'] = '4.2.7';
    return $system;
}

function slug($string)
{
    return Illuminate\Support\Str::slug($string);
}

function verificationCode($length)
{
    if ($length == 0) return 0;
    $min = pow(10, $length - 1);
    $max = (int) ($min - 1) . '9';
    return random_int($min, $max);
}

function getNumber($length = 8)
{
    $characters = '1234567890';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}


function activeTemplate($asset = false)
{
    $general = gs();
    $template = $general->active_template;
    if ($asset) return 'assets/templates/' . $template . '/';
    return 'templates.' . $template . '.';
}

function activeTemplateName()
{
    $general = gs();
    $template = $general->active_template;
    return $template;
}

function loadReCaptcha()
{
    return Captcha::reCaptcha();
}

function loadCustomCaptcha($width = '100%', $height = 46, $bgColor = '#003')
{
    return Captcha::customCaptcha($width, $height, $bgColor);
}

function verifyCaptcha()
{
    return Captcha::verify();
}

function loadExtension($key)
{
    $analytics = Extension::where('act', $key)->where('status', 1)->first();
    return $analytics ? $analytics->generateScript() : '';
}

function getTrx($length = 12)
{
    $characters = 'ABCDEFGHJKMNOPQRSTUVWXYZ123456789';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function getAmount($amount, $length = 2)
{
    $amount = round($amount, $length);
    return $amount + 0;
}

function showAmount($amount, $decimal = 2, $separate = true, $exceptZeros = false)
{
    $separator = '';
    if ($separate) {
        $separator = ',';
    }
    $printAmount = number_format($amount, $decimal, '.', $separator);
    if ($exceptZeros) {
        $exp = explode('.', $printAmount);
        if ($exp[1] * 1 == 0) {
            $printAmount = $exp[0];
        }
    }
    return $printAmount;
}

function imagePath()
{
    $data['coin'] = [
        'path' => 'assets/images/custom_coin',
        'size' => '400x400',
    ];
    $data['plan'] = [
        'path' => 'assets/images/plan',
        'size' => '400x400',
    ];
    $data['gateway'] = [
        'path' => 'assets/images/gateway',
        'size' => '500x250',
    ];
    $data['service'] = [
        'path' => 'assets/images/services',
        'size' => '500x500',
    ];
    $data['verify'] = [
        'withdraw'=>[
            'path'=>'assets/images/verify/withdraw'
        ],
        'deposit'=>[
            'path'=>'assets/images/verify/deposit'
        ]
    ];
    $data['image'] = [
        'default' => 'assets/images/default.png',
    ];
    $data['withdraw'] = [
        'method' => [
            'path' => 'assets/images/withdraw/method',
            'size' => '500x250',
        ]
    ];
    $data['ticket'] = [
        'path' => 'assets/images/support',
    ];
    $data['language'] = [
        'path' => 'assets/images/lang',
        'size' => '64x64'
    ];
    $data['logoIcon'] = [
        'path' => 'assets/images/logoIcon',
    ];
    $data['favicon'] = [
        'size' => '128x128',
    ];
    $data['extensions'] = [
        'path' => 'assets/images/extensions',
    ];
    $data['seo'] = [
        'path' => 'assets/images/seo',
        'size' => '600x315'
    ];
    $data['profile'] = [
        'user'=> [
            'path'=>'assets/images/user/profile',
            'size'=>'300x300'
        ],
        'admin'=> [
            'path'=>'assets/admin/images/profile',
            'size'=>'400x400'
        ]
    ];
    return $data;
}


function removeElement($array, $value)
{
    return array_diff($array, (is_array($value) ? $value : array($value)));
}

function cryptoQR($wallet)
{
    return "https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=$wallet&choe=UTF-8";
}


function keyToTitle($text)
{
    return ucfirst(preg_replace("/[^A-Za-z0-9 ]/", ' ', $text));
}


function titleToKey($text)
{
    return strtolower(str_replace(' ', '_', $text));
}


function strLimit($title = null, $length = 10)
{
    return Str::limit($title, $length);
}


function getIpInfo()
{
    $ipInfo = ClientInfo::ipInfo();
    return $ipInfo;
}


function osBrowser()
{
    $osBrowser = ClientInfo::osBrowser();
    return $osBrowser;
}


function getTemplates()
{
    $param['purchasecode'] = env("PURCHASECODE");
    $param['website'] = @$_SERVER['HTTP_HOST'] . @$_SERVER['REQUEST_URI'] . ' - ' . env("APP_URL");
    $url = 'https://license.viserlab.com/updates/templates/' . systemDetails()['name'];
    $response = CurlRequest::curlPostContent($url, $param);
    if ($response) {
        return $response;
    } else {
        return null;
    }
}


function getPageSections($arr = false)
{
    $jsonUrl = resource_path('views/') . str_replace('.', '/', activeTemplate()) . 'sections.json';
    $sections = json_decode(file_get_contents($jsonUrl));
    if ($arr) {
        $sections = json_decode(file_get_contents($jsonUrl), true);
        ksort($sections);
    }
    return $sections;
}


function getImage($image, $size = null)
{
    $clean = '';
    if (file_exists($image) && is_file($image)) {
        return asset($image) . $clean;
    }
    if ($size) {
        return route('placeholder.image', $size);
    }
    return asset('assets/images/default.png');
}


function notify($user, $templateName, $shortCodes = null, $sendVia = null, $createLog = true)
{
    $general = gs();
    $globalShortCodes = [
        'site_name' => $general->site_name,
        'site_currency' => $general->cur_text,
        'currency_symbol' => $general->cur_sym,
    ];

    if (gettype($user) == 'array') {
        $user = (object) $user;
    }

    $shortCodes = array_merge($shortCodes ?? [], $globalShortCodes);

    $notify = new Notify($sendVia);
    $notify->templateName = $templateName;
    $notify->shortCodes = $shortCodes;
    $notify->user = $user;
    $notify->createLog = $createLog;
    $notify->userColumn = $user->getForeignKey();
    $notify->send();
}

function getPaginate($paginate = 20)
{
    return $paginate;
}

function paginateLinks($data)
{
    return $data->appends(request()->all())->links();
}


function menuActive($routeName, $type = null, $param = null)
{
    if ($type == 3) $class = 'side-menu--open';
    elseif ($type == 2) $class = 'sidebar-submenu__open';
    else $class = 'active';

    if (is_array($routeName)) {
        foreach ($routeName as $key => $value) {
            if (request()->routeIs($value)) return $class;
        }
    } elseif (request()->routeIs($routeName)) {
        if ($param) {
            if (request()->route(@$param[0]) == @$param[1]) return $class;
            else return;
        }
        return $class;
    }
}

function makeDirectory($path)
{
    if (file_exists($path)) return true;
    return mkdir($path, 0755, true);
}


function removeFile($path)
{
    return file_exists($path) && is_file($path) ? @unlink($path) : false;
}

//moveable
function uploadImage($file, $location, $size = null, $old = null, $thumb = null)
{
    $path = makeDirectory($location);
    if (!$path) throw new Exception('File could not been created.');

    if (!empty($old)) {
        removeFile($location . '/' . $old);
        removeFile($location . '/thumb_' . $old);
    }
    $filename = uniqid() . time() . '.' . $file->getClientOriginalExtension();
    $image = Image::make($file);
    if (!empty($size)) {
        $size = explode('x', strtolower($size));
        $image->resize($size[0], $size[1],function($constraint){
            $constraint->aspectRatio();
            $constraint->upsize();
        });
    }
    $image->save($location . '/' . $filename);

    if (!empty($thumb)) {

        $thumb = explode('x', $thumb);
        Image::make($file)->resize($thumb[0], $thumb[1],function($constraint){
            $constraint->aspectRatio();
            $constraint->upsize();
        })->save($location . '/thumb_' . $filename);
    }

    return $filename;
}

function fileUploader($file, $location, $size = null, $old = null, $thumb = null)
{
    $fileManager = new FileManager($file);
    $fileManager->path = $location;
    $fileManager->size = $size;
    $fileManager->old = $old;
    $fileManager->thumb = $thumb;
    $fileManager->upload();
    return $fileManager->filename;
}

function fileManager()
{
    return new FileManager();
}

function getFilePath($key)
{
    return fileManager()->$key()->path;
}

function getFileSize($key)
{
    return fileManager()->$key()->size;
}

function getFileExt($key)
{
    return fileManager()->$key()->extensions;
}

function diffForHumans($date)
{
    $lang = session()->get('lang');
    Carbon::setlocale($lang);
    return Carbon::parse($date)->diffForHumans();
}


function showDateTime($date, $format = 'Y-m-d h:i A')
{
    $lang = session()->get('lang');
    Carbon::setlocale($lang);
    return Carbon::parse($date)->translatedFormat($format);
}


function getContent($dataKeys, $singleQuery = false, $limit = null, $orderById = false)
{
    if ($singleQuery) {
        $content = Frontend::where('data_keys', $dataKeys)->orderBy('id', 'desc')->first();
    } else {
        $article = Frontend::query();
        $article->when($limit != null, function ($q) use ($limit) {
            return $q->limit($limit);
        });
        if ($orderById) {
            $content = $article->where('data_keys', $dataKeys)->orderBy('id')->get();
        } else {
            $content = $article->where('data_keys', $dataKeys)->orderBy('id', 'desc')->get();
        }
    }
    return $content;
}


function gatewayRedirectUrl($type = false)
{
    if ($type) {
        return 'user.deposit.history';
    } else {
        return 'user.deposit';
    }
}

function verifyG2fa($user, $code, $secret = null)
{
    $authenticator = new GoogleAuthenticator();
    if (!$secret) {
        $secret = $user->tsc;
    }
    $oneCode = $authenticator->getCode($secret);
    $userCode = $code;
    if ($oneCode == $userCode) {
        $user->tv = 1;
        $user->save();
        return true;
    } else {
        return false;
    }
}


function urlPath($routeName, $routeParam = null)
{
    if ($routeParam == null) {
        $url = route($routeName);
    } else {
        $url = route($routeName, $routeParam);
    }
    $basePath = route('home');
    $path = str_replace($basePath, '', $url);
    return $path;
}


function showMobileNumber($number)
{
    $length = strlen($number);
    return substr_replace($number, '***', 2, $length - 4);
}

function showEmailAddress($email)
{
    $endPosition = strpos($email, '@') - 1;
    return substr_replace($email, '***', 1, $endPosition);
}


function getRealIP()
{
    $ip = $_SERVER["REMOTE_ADDR"];
    //Deep detect ip
    if (filter_var(@$_SERVER['HTTP_FORWARDED'], FILTER_VALIDATE_IP)) {
        $ip = $_SERVER['HTTP_FORWARDED'];
    }
    if (filter_var(@$_SERVER['HTTP_FORWARDED_FOR'], FILTER_VALIDATE_IP)) {
        $ip = $_SERVER['HTTP_FORWARDED_FOR'];
    }
    if (filter_var(@$_SERVER['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP)) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    if (filter_var(@$_SERVER['HTTP_CLIENT_IP'], FILTER_VALIDATE_IP)) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }
    if (filter_var(@$_SERVER['HTTP_X_REAL_IP'], FILTER_VALIDATE_IP)) {
        $ip = $_SERVER['HTTP_X_REAL_IP'];
    }
    if (filter_var(@$_SERVER['HTTP_CF_CONNECTING_IP'], FILTER_VALIDATE_IP)) {
        $ip = $_SERVER['HTTP_CF_CONNECTING_IP'];
    }
    if ($ip == '::1') {
        $ip = '127.0.0.1';
    }

    return $ip;
}


function appendQuery($key, $value)
{
    return request()->fullUrlWithQuery([$key => $value]);
}


function dateSort($a, $b)
{
    return strtotime($a) - strtotime($b);
}

function dateSorting($arr)
{
    usort($arr, "dateSort");
    return $arr;
}

//fix-reffer
// function levelCommission($referee, $amount, $commissionType, $trx)
// {

//     $general = gs();
//     if (!$general->$commissionType) {
//         return false;
//     }

//     $i = 1;
//     $level = Referral::where('commission_type', $commissionType)->get();

//     $tempReferee = $referee;


//     while ($i <= $level->count()) {
//         $referer = $tempReferee->refBy;
//         if (!$referer) {
//             break;
//         }

//         $plan = $referer->plan;
//         if (!$plan) {
//             $tempReferee = $referer;
//             $i++;
//             continue;
//         }

//         if ($i > $plan->ref_level) {
//             $tempReferee = $referer;
//             $i++;
//             continue;
//         }

//         $commission = Referral::where('commission_type', $commissionType)->where('level', $i)->first();

//         if (!$commission) {
//             break;
//         }

//         if($amount < $referer->plan_price){
//             $com = ($amount * $commission->percent) / 100;
//             $referer->balance += $com;
//             $referer->save();
//         }else{
//             $com = ($referer->plan_price * $commission->percent) / 100;
//             $referer->balance += $com;
//             $referer->save();
//         }

//         $transactions[] = [
//             'user_id' => $referer->id,
//             'amount' => $com,
//             'post_balance' => $referer->balance,
//             'charge' => 0,
//             'trx_type' => '+',
//             'details' => ordinal($i) . ' level referral commission from ' . $referee->username,
//             'remark' => 'referral_commission',
//             'trx_logo' => 'reffer_logo.png',
//             'trx' => $trx,
//             'created_at' => now()
//         ];

//         $commissionLog[] = [
//             'to_id' => $referer->id,
//             'from_id' => $referee->id,
//             'level' => $i,
//             'amount' => $com,
//             'details' => ordinal($i) . ' level referral commission from ' . $referee->username,
//             'type' => $commissionType,
//             'trx' => $trx,
//             'created_at' => now()
//         ];

//         notify($referer, 'REFERRAL_COMMISSION', [
//             'amount' => showAmount($com),
//             'post_balance' => showAmount($referer->balance),
//             'trx' => $trx,
//             'level' => ordinal($i),
//             'type' => ucfirst(str_replace('_', ' ', $commissionType))
//         ]);

//         $tempReferee = $referer;
//         $i++;
//     }

//     if (isset($transactions)) {
//         Transaction::insert($transactions);
//     }

//     if (isset($commissionLog)) {
//         CommissionLog::insert($commissionLog);
//     }
// }


////old-reffer
// function levelCommission($referee, $amount, $commissionType, $trx)
// {
//     if($amount > $referee->plan_price){

//     }

//     $general = gs();
//     if (!$general->$commissionType) {
//         return false;
//     }

//     $i = 1;
//     $level = Referral::where('commission_type', $commissionType)->get();

//     $tempReferee = $referee;

//     while ($i <= $level->count()) {
//         $referer = $tempReferee->refBy;
//         if (!$referer) {
//             break;
//         }

//         $plan = $referer->plan;
//         if (!$plan) {
//             $tempReferee = $referer;
//             $i++;
//             continue;
//         }

//         if ($i > $plan->ref_level) {
//             $tempReferee = $referer;
//             $i++;
//             continue;
//         }

//         $commission = Referral::where('commission_type', $commissionType)->where('level', $i)->first();

//         if (!$commission) {
//             break;
//         }

//         $com = ($amount * $commission->percent) / 100;
//         $referer->balance += $com;
//         $referer->save();


//         $transactions[] = [
//             'user_id' => $referer->id,
//             'amount' => $com,
//             'post_balance' => $referer->balance,
//             'charge' => 0,
//             'trx_type' => '+',
//             'details' => ordinal($i) . ' level referral commission from ' . $referee->username,
//             'remark' => 'referral_commission',
//             'trx_logo' => 'reffer_logo.png',
//             'trx' => $trx,
//             'created_at' => now()
//         ];

//         $commissionLog[] = [
//             'to_id' => $referer->id,
//             'from_id' => $referee->id,
//             'level' => $i,
//             'amount' => $com,
//             'details' => ordinal($i) . ' level referral commission from ' . $referee->username,
//             'type' => $commissionType,
//             'trx' => $trx,
//             'created_at' => now()
//         ];

//         notify($referer, 'REFERRAL_COMMISSION', [
//             'amount' => showAmount($com),
//             'post_balance' => showAmount($referer->balance),
//             'trx' => $trx,
//             'level' => ordinal($i),
//             'type' => ucfirst(str_replace('_', ' ', $commissionType))
//         ]);

//         $tempReferee = $referer;
//         $i++;
//     }

//     if (isset($transactions)) {
//         Transaction::insert($transactions);
//     }

//     if (isset($commissionLog)) {
//         CommissionLog::insert($commissionLog);
//     }
// }


/*
* new trading reffer
*/

function levelCommission($referee, $amount, $commissionType, $trx)
{

    $general = gs();
    if (!$general->$commissionType) {
        return false;
    }

    $i = 1;
    $level = Referral::where('commission_type', $commissionType)->get();

    $tempReferee = $referee;

    while ($i <= $level->count()) {
        $referer = $tempReferee->refBy;
        if (!$referer) {
            break;
        }

        $plan = $referer->plan;
        if (!$plan) {
            $tempReferee = $referer;
            $i++;
            continue;
        }

        if ($i > $plan->ref_level) {
            $tempReferee = $referer;
            $i++;
            continue;
        }

        $commission = Referral::where('commission_type', $commissionType)->where('level', $i)->first();

        if (!$commission) {
            break;
        }




        //new change start
        if ($commissionType == 'ptc_view_commission') {
            if ($referer->level_id) {
                // $refPer = $referer->level->profit;
                // $amount = $referer->level->min * ($refPer/100);

                $refererTradeLev = $referer->level_id; //you
                $meLev = $tempReferee->level_id; //me

                // dd($refererTradeLev);

                if ($refererTradeLev > $meLev) {
                    $refPer = $tempReferee->level->profit;
                    $amount2 = $tempReferee->level->min * ($refPer/100);
                    $com = ($amount2 * $commission->percent) / 100; // new form me
                } else {
                    $refPer = $referer->level->profit;
                    $amount2 = $referer->level->min * ($refPer/100);
                    $com = ($amount2 * $commission->percent) / 100; // new form me
                }

                // $com = ($amount * $commission->percent) / 100; // new form me
                // $com = $amount; // new form me without percent
            } else {
                $com = 0;
            }
        } else {
            $com = ($amount * $commission->percent) / 100; // old system from downlevel
        }
        //new change end


        $referer->balance += $com;
        $referer->save();


        $transactions[] = [
            'user_id' => $referer->id,
            'amount' => $com,
            'post_balance' => $referer->balance,
            'charge' => 0,
            'trx_type' => '+',
            'details' => ordinal($i) . ' level referral commission from ' . $referee->username,
            'remark' => 'referral_commission',
            'trx_logo' => 'reffer_logo.png',
            'trx' => $trx,
            'created_at' => now()
        ];

        $commissionLog[] = [
            'to_id' => $referer->id,
            'from_id' => $referee->id,
            'level' => $i,
            'amount' => $com,
            'details' => ordinal($i) . ' level referral commission from ' . $referee->username,
            'type' => $commissionType,
            'trx' => $trx,
            'created_at' => now()
        ];

        notify($referer, 'REFERRAL_COMMISSION', [
            'amount' => showAmount($com),
            'post_balance' => showAmount($referer->balance),
            'trx' => $trx,
            'level' => ordinal($i),
            'type' => ucfirst(str_replace('_', ' ', $commissionType))
        ]);

        $tempReferee = $referer;
        $i++;
    }

    if (isset($transactions)) {
        Transaction::insert($transactions);
    }

    if (isset($commissionLog)) {
        CommissionLog::insert($commissionLog);
    }
}


function ordinal($number)
{
    $ends = array('th', 'st', 'nd', 'rd', 'th', 'th', 'th', 'th', 'th', 'th');
    if ((($number % 100) >= 11) && (($number % 100) <= 13)) {
        return $number . 'th';
    } else {
        return $number . $ends[$number % 10];
    }
}

function gs()
{
    $general = Cache::get('GeneralSetting');
    if (!$general) {
        $general = GeneralSetting::first();
        Cache::put('GeneralSetting', $general);
    }
    return $general;
}


function refferBy($id){
    $user = User::where('ref_by', $id)->first();
    return $user->username;
}

function showUserLevel($id, $level)
{
    $general = GeneralSetting::first();
    $myref  = showBelow($id);
    $nxt    = $myref;

    for ($i = 1; $i < $level; $i++) {
        $nxt = array();
        foreach ($myref as $uu) {
            $n = showBelow($uu);
            $nxt = array_merge($nxt, $n);
        }
        $myref = $nxt;
    }

    foreach ($nxt as $key => $uu) {
        $key += 1;
        $data = User::where('id', $uu)->with('plan','level')->first();

        $fd = 0;
        $fdata = Deposit::where('user_id', $uu)->where('status', 1)->orderBy('created_at', 'asc')->first();
        if ( !blank($fdata) ){
            $fd = getAmount($fdata->amount).' '.$fdata->method_currency;
        }
        $sp = '';
        // if ( $data->refBy ){
        // $sp = $data->refBy->username;
        // }

        // dd($sp);

        if($data->image!=null){
            $userImg = $data->image;
        }else{
            $userImg = 'dummy-profile.png';
        }
        if ($data->plan) {
            $plan = $data->plan->name;
        } else {
            $plan = 'No Plan!';
        }
        if ($data->level_id) {
            $level = $data->level->name;
        } else {
            $level = 'No Level!';
        }

        // echo $data->count();

        echo '
        <div class="col-md-6 col-xl-4">
            <div class="card mb-3">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <img class="img-thumbnail rounded-circle" style="width: 50px; height: 50px;" src="'.route("home").'/assets/images/user/profile/'.$userImg.'" alt="Image">
                        </div>
                        <div class="col">
                            <p class="text-secondary mb-1"><b>Name:</b> '.$data->firstname.' '.$data->lastname.'</p>
                            <p class="text-secondary mb-0"><b>Plan:</b> '.$plan.'</p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        ';
    }

}

function countIfPlanActive($id, $level)
{
    $general = GeneralSetting::first();
    $myref  = showBelow($id);
    $nxt    = $myref;

    for ($i = 1; $i < $level; $i++) {
        $nxt = array();
        foreach ($myref as $uu) {
            $n = showBelow($uu);
            $nxt = array_merge($nxt, $n);
        }
        $myref = $nxt;
    }

    // $data = User::where('ref_by', $myref)->where('plan_id', '>', 0)->count();
    // echo $data;

    foreach ($nxt as $key => $uu) {
        $key += 1;
        $data = User::where('id', $uu)->where('plan_id', '>', 0)->count();

        echo $data;
    }

}

function check_user_level($id, $level)
{
    $myref  = showBelow($id);
    $nxt    = $myref;
    for ($i = 1; $i < $level; $i++) {
        $nxt = array();
        foreach ($myref as $uu) {
            $n = showBelow($uu);
            $nxt = array_merge($nxt, $n);
        }
        $myref = $nxt;
    }
    return count($nxt);
}

function get_user_level_count($id)
{
    $t = 0;
    $max = 100;
    for ($i = 1; $i < $max; $i++) {
        $count = check_user_level($id, $i);
        if ( $count < 1 ){
            break;
        }
        $t++;
    }

    return $t;
}

function showBelow($id)
{
    $arr = array();
    $under_ref = User::select('id')->where('ref_by', $id)->get();

    foreach ($under_ref as $u) {
        array_push($arr, $u->id);
    }

    return $arr;
}


//get time

function getTime($time){
    $t = Carbon::parse($time)->toTimeString();
    return $t;
}






// coin rate api
function getCoinRate($coin1='BTC', $coin2='USDT', $api=null)
{
    $url        = 'https://min-api.cryptocompare.com/data/price?fsym=' . $coin1 . '&tsyms=' . $coin2 . '&api_key='. $api;
    $crypto     = file_get_contents($url);
    $rate        = json_decode($crypto, true);
    // dd($rate);
    $cryptoRate = $rate[$coin2];
    return $cryptoRate;
}


//// file get html Library ////
// include('core/app/Http/Helpers/file_get_html.php');


