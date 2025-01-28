<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Package;
use App\Models\Setting;
use App\Models\VipType;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PackageController extends Controller
{
    public $route = 'admin.package';
    public function index()
    {
        $packages = Package::OrderBy('id', 'desc')->get();
        return view('admin.pages.package.index', compact('packages'));
    }
    public function create($id=null)
    {
        $data = null;
        if ($id){
            $data = Package::find($id);
        }

        $vipTypes = VipType::where(['status' => 'active'])->get();
        $categories = Category::where(['status' => 'active'])->get();
        return view('admin.pages.package.insert', compact('data', 'vipTypes', 'categories'));
    }

    public function view($id=null)
    {
        $data = Package::find($id);
        return view('admin.pages.package.view', compact('data'));
    }

    public function insert_or_update(Request $request)
    {
        $this->validate($request,[
            'for_vip'=> 'required',
            'vip_id'=> 'required',
            'name'=> 'required',
            'title'=> 'required',
            'category_id'=> 'required',
            'has_limit'=> 'required',
            'buy_limit'=> 'required',
            'price'=> 'required|numeric',
            'earn_type'=> 'required',
            'validity'=> 'required|numeric',
            //'hours'=> 'required|numeric',
            'interest'=> 'required|numeric',
            'p_status'=> 'required',
            'status'=> 'required'
        ]);

        // Setting
        $setting = Setting::first();

        $isUpdate = true;

        if ($request->id){
            $model = Package::findOrFail($request->id);
        }else{
            $isUpdate = false;
            $model = new Package();
        }
        $path = uploadImage(false ,$request, 'photo', 'upload/package/', 200, 200 ,$model->photo);
        $model->photo = $path ?? $model->photo;
        $model->for_vip = $request->for_vip;
        $model->vip_id = $request->vip_id;
        $model->name = $request->name;
        $model->title = $request->title;
        $model->category_id = $request->category_id;
        $model->has_limit = $request->has_limit;
        $model->buy_limit = $request->buy_limit;
        $model->currency = $setting->cur_text;
        $model->price = $request->price;
        $model->earn_type = $request->earn_type;
        //$model->hours = $request->hours;
        $model->code = Str::random(30);
        $model->validity = $request->validity;
        $model->interest = $request->interest;
        $model->p_status = $request->p_status;
        $model->status = $request->status;
        $model->save();
        
        // Return for Update
        if($isUpdate) return redirect()->back()->with('success', $request->id ? 'Package Updated Successful.' : 'Package Created Successful.');

        // Return for new created
        return redirect()->route($this->route.'.index')->with('success', $request->id ? 'Package Updated Successful.' : 'Package Created Successful.');
    }

    public function delete($id)
    {
        $model = Package::find($id);
        deleteImage($model->photo);
        $model->delete();
        return redirect()->route($this->route.'.index')->with('success','Item Deleted Successful.');
    }
}
