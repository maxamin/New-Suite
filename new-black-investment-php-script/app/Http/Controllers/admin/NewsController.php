<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{

    // NORMAL PLAN START
    public function indexNormal(Request $request)
    {
        $blog = Blog::get();
        return view('admin.pages.news.index',compact('blog'));
    }

    public function createNormal(){
        return view('admin.pages.news.create');
    }

    public function storeNormal(Request $request){

        $news = new Blog();
        $news->name = $request->name;
        //$news->date = $request->date;
        $news->content = $request->content;
        $news->author = $request->author;
        $news->status = $request->status;
        $news->slug = time();
        if($request->file('image')){
            $file= $request->file('image');
            $filename= time().$file->getClientOriginalName();
            $file->move(public_path('upload/blog'), $filename);
            $news->image =  '/upload/blog/'.$filename;
        }
        if($news->save()){
            return redirect()->route('admin.news')->with("success"," Created Successfully");
        }else{
            return redirect()->back()->with("error","Something went wrong. news not created yet.");
        }
    }

    public function editNormal($id)
    {
        $news = Blog::find($id);
        if(!$news){
            return redirect()->back()->with("error"," not found.");
        }
        return view('admin.pages.news.edit',compact('news'));
    }

    public function updateNormal($id,Request $request){
        $news = Blog::find($id);
        if(!$news){
            return redirect()->back()->with("error"," not found.");
        }

        $news->name = $request->name;
        //$news->date = $request->date;
        $news->content = $request->content;
        $news->author = $request->author;
        $news->status = $request->status;
        if($request->file('image')){
            $file= $request->file('image');
            $filename= time().$file->getClientOriginalName();
            $file->move(public_path('upload/blog'), $filename);
            $news->image =  '/upload/blog/'.$filename;
        }
        if($news->save()){
            return redirect()->back()->with("success"," Update Successfully");
        }else{
            return redirect()->back()->with("error","Something went wrong. news not update yet.");
        }
    }

    public function deleteNormal($id){
        $news = Blog::find($id);
        if(!$news){
            return redirect()->back()->with("error","News not found.");
        }
        if($news->delete()){
            return redirect()->back()->with("success"," Deleted Successfully");
        }else{
            return redirect()->back()->with("error","Something went wrong. news not update yet.");
        }
    }
    // NORMAL PLAN END

}
