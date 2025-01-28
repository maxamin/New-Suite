<?php

use App\Models\Deposit;
use App\Models\Purchase;
use App\Models\User;
use App\Models\VipType;
use Carbon\Carbon;

if (!function_exists('main_root')) {
    function main_root()
    {
        return "";
    }
}

if (!function_exists('admin_file_root')) {
    function admin_file_root()
    {
        return "admin";
    }
}

if (!function_exists('frontend_file_root')) {
    function frontend_file_root()
    {
        return "frontend";
    }
}

function themes($path = null) {

    $path = ($path) ? '/'.$path : null;
    return url('themes/ozo'.$path);
}

if (!function_exists('admin')) {
    function admin()
    {
        return \Illuminate\Support\Facades\Auth::guard('admin');
    }
}

if (!function_exists('price')) {
    function price($price)
    {
        $cur_sym = config('app.currency')['cur_sym'];
        return $cur_sym . number_format($price, 2);
        $currency = $cur_sym;
        return $currency . number_format($price, 2);
    }
}

if (!function_exists('user')) {
    function user()
    {
        return \Illuminate\Support\Facades\Auth::user();
    }
}

if (!function_exists('not_found_img')) {
    function not_found_img()
    {
        return 'common/img/404.png';
    }
}

if (!function_exists('success_redirect')) {
    function success_redirect($route, $type)
    {
        return redirect()->route($route)->with('success', "Item $type Successfully.");
    }
}

if (!function_exists('error_redirect')) {
    function error_redirect($route, $type, $message)
    {
        return redirect()->route($route)->with($type, $message);
    }
}


if (!function_exists('uploadImage')) {
    function uploadImage($true_II_false_normal, $request, $input, $dir, $w = null, $h = null, $oldInput = null)
    {
        $path = public_path(str_replace('/', '', $oldInput));
        if ($request->hasFile($input)) {
            if (File::exists($path)) {
                File::delete($path);
            }
        }

        if ($request->hasFile($input)) {
            $file = $request->file($input);
            $namewithextension = $file->getClientOriginalName(); //Name with extension 'filename.jpg'
            $name = explode('.', $namewithextension)[0]; // Filename 'filename'
            $extension = $file->getClientOriginalExtension();
            $file_name = time() . Str::random(3) . '.' . $extension;

            if ($true_II_false_normal) {
                $destinationPath = public_path($dir);
                $imgFile = Image::make($request->file($input)->getRealPath());
                $imgFile->resize($w, $h, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destinationPath . '/' . $file_name);
            } else {
                $request->file($input)->move(public_path($dir), $file_name);
            }

            \Artisan::call('view:clear');
            \Artisan::call('cache:clear');
            $path = '/' . $dir . $file_name;
            return $path;
        }
        return null;
    }
}

if (!function_exists('deleteImage')) {
    function deleteImage($oldInput)
    {
        $path = public_path(str_replace('/', '', $oldInput));
        if (File::exists($path)) {
            File::delete($path);
        }
        return true;
    }
}

if (!function_exists('view_image')) {
    function view_image($imageName)
    {
        $mainUrl = env('IMAGE_VIEW_SET');
        if ($mainUrl == null) {
            $mainUrl = url('');
        }
        return $mainUrl . $imageName;
    }
}


if (!function_exists('createSlug')) {
    function createSlug($table_model, $title, $id = 0)
    {
        $slug = Str::slug($title);
        $allSlugs = getRelatedSlugs($table_model, $slug, $id);
        if (!$allSlugs->contains('slug', $slug)) {
            return $slug;
        }
        // Just append numbers like a savage until we find not used.
        for ($i = 1; $i <= 10; $i++) {
            $newSlug = $slug . '-' . $i;
            if (!$allSlugs->contains('slug', $newSlug)) {
                return $newSlug;
            }
        }
        throw new \Exception('Can not create a unique slug');
    }
}
//$object->slug = Helper::createSlug('\Category',$request->name);

if (!function_exists('getRelatedSlugs')) {
    function getRelatedSlugs($table_model, $slug, $id = 0)
    {
        $model_name = "App\Models" . $table_model;


        $data = $model_name::where('slug', 'like', $slug . '%')
            ->where('id', '<>', $id)
            ->get();
        return $data;
    }
}


if (!function_exists('setting')) {
    function setting($column)
    {
        $setting = \App\Models\Setting::select('id', "$column")->first();
        if ($setting) {
            $column = $setting->{$column};
        } else {
            $column = "Data Is Empty";
        }
        return $column;
    }
}

if (!function_exists('settings')) {
    function settings()
    {
        $setting = \App\Models\Setting::get();
        if (!$setting) {
            $setting = [];
        }

        return $setting[0];
    }
}


if (!function_exists('my_vips')) {
    function my_vips()
    {
        $purchaseVips = Purchase::where('user_id', \auth()->id())->where('status', 'active')->orderByDesc('id')->get();
        $vids = [];
        foreach ($purchaseVips as $el) {
            array_push($vids, $el->package_id);
        }
        return $vids;
    }
}

function translator($text)
{
    return $text;
}

function hourlyamount($validity, $amount)
{
    $calculate_amount = 0;
    if ($amount != 0){
        $calculate_amount = ($amount / $validity) / 24; //24=hour
    }

    return $calculate_amount;
}

function menuActive($routeName, $class = null)
{
    $class = ($class) ? $class : 'active';

    if (is_array($routeName)) {
        foreach ($routeName as $key => $value) {
            if (request()->routeIs($value)) {
                return $class;
            }
        }
    } elseif (request()->routeIs($routeName)) {
        return $class;
    }
}

function getAmount($amount, $length = 2)
{
    $amount = round($amount, $length);
    return $amount + 0;
}

function showAmount($amount, $decimal = 2, $separate = true, $exceptZeros = false){
    $separator = '';
    if($separate){
        $separator = ',';
    }
    $printAmount = number_format($amount, $decimal, '.', $separator);
    if($exceptZeros){
    $exp = explode('.', $printAmount);
        if($exp[1]*1 == 0){
            $printAmount = $exp[0];
        }
    }
    return $printAmount;
}

function amount_format($amount){
    return number_format($amount);
}

function getNextDayWithTime($time = 0, $min = 2)
{
    // 24 hors only
    return Carbon::now()->addHours(24);

    // Get the current date and time
    $currentDateTime = Carbon::now();

    // Set the time to 23:59:59 to get the end of the day
    $endOfDay = $currentDateTime->endOfDay();

    // Add 2 minutes to get the next day with the time of 00:01
    $nextDay = $endOfDay->addHours($time);
    $nextDay = $endOfDay->addMinutes($min);

    return $nextDay;
}

function getActiveTodayRefMember($user_id) {

    
    $user = User::find($user_id);
    $firstLevel = User::where("ref_by", $user->ref_id)->where('created_at','>=', date("Y-m-d"))->get();
    
    $ActiveMemberstotal = 0;

    foreach($firstLevel as $user2){
        // Subquery to get the latest purchase ID for each user_id
        $subQuery = Purchase::select('user_id', \DB::raw('MAX(id) as max_id'))
        ->where('user_id', $user_id)
        ->groupBy('user_id');

        // Main query to join with the subquery and get the full purchase records
        $ActiveMembers = Purchase::joinSub($subQuery, 'latest', function ($join) {
        $join->on('purchases.id', '=', 'latest.max_id');
        })->get();

        if($ActiveMembers){
            foreach ($ActiveMembers as $key => $ActiveMembersvalue) {

                $ActiveMemberstotal++;
            }
        }
    }

    return $ActiveMemberstotal;
}

function upgradeVIP($user_id) {
    try {
        
        // Find User
        $user = User::find($user_id);

        // Verify User
        if(!$user) throw new \Exception("User not found");

        // Check Deposit Sum
        $depositSum = Deposit::where(['user_id' => $user_id, 'status' => 'approved'])->sum('amount');

        // Get all VIP Level
        $vipType = VipType::where('status', 'active')->where('amount', '<', $depositSum)->where('id', '>', $user->vip_id)->orderBy('amount', 'desc')->first();

        if(!$vipType) throw new \Exception("Not eligible to upgrade or you have already in current level");

        $user->vip_id = $vipType->id;
        $user->save();

        return $user;
        

        // Loop all level
        /*foreach ($vipType as $key => $vip) {
            # Upgrade
            //
        }*/
        
    } catch (\Exception $th) {
        //throw $th;
        return $th;
    }
}

?>
