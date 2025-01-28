<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\OtpMail;
use App\Models\OtpCode;
use Twilio\Rest\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class OtpController extends Controller
{
    public function otpPage($ref_code = null){
        $pageTitle = "Sign Up";

        $reference = $ref_code;

        session()->put('reference', $reference);
        $info       = json_decode(json_encode(getIpInfo()), true);
        $mobileCode = @implode(',', $info['code']);
        $countries  = json_decode(file_get_contents(resource_path('views/partials/country.json')));
        return view('templates.basic.user.auth.signup', compact('mobileCode', 'pageTitle','countries'));
    }

    public function otpStore(Request $request){
        // dd($request->all());
        $request->validate([
            'email'=>'required|email|unique:users',
            'mobile'=>'required|unique:users',
        ]);
        $findotp = OtpCode::where('email', $request->email)->first();

        if($findotp){
            $otp = OtpCode::where('email', $request->email)->first();
        }else {
            $otp = new OtpCode();
        }
        $otp->otp = rand(1000,9999);
        $otp->email = $request->email;
        $otp->mobile = $request->mobile;
        $otp->save();
        return response()->json(['msg'=>'Otp Sent!', 'cls'=>'success']);
    }

    public function signupSubmit(Request $request){
        // dd($request->country_code);
        $request->validate([
            'email'=>'required|email|unique:users',
            'mobile'=>'required',
        ]);

        $otp = OtpCode::where('email', $request->email)->first();

        if ($otp->otp != $request->otp) {
            return response()->json(['msg'=>'Otp Not Matched!', 'cls'=>'error']);
        }
        $otp->isVerify = 1;
        $otp->save();

        if ($request->referBy) {
            session()->put('reference', $request->referBy);
        }
        session()->put('email', $request->email);
        session()->put('number', $request->number);
        session()->put('country', $request->country);
        session()->put('country_code', $request->country_code);
        session()->put('dial_code', $request->dial_code);

        return response()->json(['msg'=>'Verify Successfull!', 'cls'=>'success']);
    }

    public function otpTemplate(Request $request){
        $otp = OtpCode::where('email', $request->email)->first();
        view('templates.basic.user.auth.otp_mail_template', compact('otp'));
    }
    public function sendOtpMail(Request $request){
        // dd($request->all());
        $general = gs();
        $otp = OtpCode::where('email', $request->email)->first();
        $to = $otp->email;
        Mail::to($to)->send(new OtpMail($otp));

        // $headers = "From: TradeGPTAi <$general->email_from>";
        // $msg = "Your $general->site_name OTP is $otp->otp";
        // $msg = wordwrap($msg,70);
        // mail($to,"Signup OTP",$msg, $headers);

        // $account_sid = getenv("TWILIO_SID");
        // $auth_token = getenv("TWILIO_AUTH_TOKEN");
        // $twilio_number = getenv("TWILIO_NUMBER");
        // $client = new Client($account_sid, $auth_token);
        // $client->messages->create("+$request->mobile", ['from' => $twilio_number, 'body' => $msg]);
        return response()->json(['msg'=>'OTP Sent Successfully!', 'cls'=>'success']);
    }
}
