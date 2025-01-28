<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Blog;

class BlogController extends Controller
{
    public function index()
    {
        // Get all blogs
        $blogs = Blog::where(['status' => 1])->get();
            
        $emptyMessage = 'Sorry no any news to show';
        return view('app.main.blog.index', compact('blogs', 'emptyMessage'));
    }

    public function page($id)
    {
        // Verify id
        $blog = Blog::where(['slug' => $id, 'status' => 1])->first();

        // Exception
        if(!$blog) return redirect()->back()->with("error", "Sorry news not available");
        
        return view('app.main.blog.page', compact('blog'));
    }
}
