<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Setting;
use App\Models\VipType;
use Illuminate\Http\Request;

/**
 * Laravel/Symfony Developer
 * Name: Muongozo
 * Telegram: @muongozotrader
 * Hire me via Telegram: muongozotrader
 */
class VipController extends Controller
{
    ################################ CATEGORY #########################################
    public function category()
    {
        $categories = Category::OrderBy('id', 'desc')->get();
        return view('admin.pages.vip.category.index', compact('categories'));
    }
    public function category_create($id=null)
    {
        $data = null;
        if ($id){
            $data = Category::find($id);
        }
        
        return view('admin.pages.vip.category.insert', compact('data'));
    }

    public function category_insert_or_update(Request $request)
    {
        $this->validate($request,[
            'name'=> 'required',
            'status'=> 'required'
        ]);

        $isUpdate = true;

        if ($request->id){
            $model = Category::findOrFail($request->id);
        }else{
            $isUpdate = false;
            $model = new Category();
        }
        $path = uploadImage(false ,$request, 'photo', 'upload/vip/category/', 200, 200 ,$model->photo);
        $model->photo = $path ?? $model->photo;
        $model->name = $request->name;
        $model->tag = time();
        $model->status = $request->status;
        $model->save();
        
        // Return for Update
        if($isUpdate) return redirect()->back()->with('success', $request->id ? 'Updated Successful.' : 'Created Successful.');

        // Return for new created
        return redirect()->route('admin.category.index')->with('success', $request->id ? 'Updated Successful.' : 'Created Successful.');
    }

    public function category_delete($id)
    {
        $model = Category::find($id);
        deleteImage($model->photo);
        $model->delete();
        return redirect()->route('admin.category.index')->with('success','Deleted Successful.');
    }
    ################################ CATEGORY #########################################

    ################################ TYPE #########################################
    public function type()
    {
        $vipTypes = VipType::OrderBy('id', 'desc')->get();
        return view('admin.pages.vip.type.index', compact('vipTypes'));
    }
    public function type_create($id=null)
    {
        $data = null;
        if ($id){
            $data = VipType::find($id);
        }
        
        return view('admin.pages.vip.type.insert', compact('data'));
    }

    public function type_insert_or_update(Request $request)
    {
        $this->validate($request,[
            'name'=> 'required',
            'level'=> 'required',
            'amount'=> 'required',
            'text_desc'=> 'required',
            'status'=> 'required'
        ]);

        $isUpdate = true;

        if ($request->id){
            $model = VipType::findOrFail($request->id);
        }else{
            $isUpdate = false;
            $model = new VipType();
        }
        $model->name = $request->name;
        $model->level = $request->level;
        $model->amount = $request->amount;
        $model->text_desc = $request->text_desc;
        $model->status = $request->status;
        $model->save();
        
        // Return for Update
        if($isUpdate) return redirect()->back()->with('success', $request->id ? 'Updated Successful.' : 'Created Successful.');

        // Return for new created
        return redirect()->route('admin.type.index')->with('success', $request->id ? 'Updated Successful.' : 'Created Successful.');
    }

    public function type_delete($id)
    {
        $model = VipType::find($id);
        deleteImage($model->photo);
        $model->delete();
        return redirect()->route('admin.type.index')->with('success','Deleted Successful.');
    }
    ################################ TYPE #########################################
}
