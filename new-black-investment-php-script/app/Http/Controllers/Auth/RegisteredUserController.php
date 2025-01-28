<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(Request $request, $id=null)
    {
        if ($id)
        {
            User::find($id)->delete();
        }
        
        $ref_by = $request->query('ref_by');
        return view('app.auth.registration', compact('ref_by'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'email' => ['required', 'unique:users,email'],
            'ref_id' => ['required'],
            'password' => ['required'],
        ]);

        if ($validate->fails()){
            return redirect()->back()->withErrors($validate->errors());
        }

        if ($request->password != $request->c_password){
            return redirect()->back()->with('error', 'Confirm password not match.');
        }

        $setting = Setting::first();

        $user = User::create([
            'name' => 'U_'.time(),
            'username' => $request->email,
            'ref_id' => rand(9999999,1111111),
            'ref_by' => $request->ref_id,
            'email' => $request->email,
            'phone' => time(),
            'password' => Hash::make($request->password),
            'type' => 'user',
            'balance' => $setting->welcome_bonus,
            'income' => 0,
            'code' => $request->code,
            'vip_id' => '1',
            'remember_token' => Str::random(30),
        ]);

        if ($user){
            Auth::login($user);
            return redirect()->route('dashboard');
        }else{
            return redirect()->back()->with('error', 'Something went wrong.');
        }
    }
}
