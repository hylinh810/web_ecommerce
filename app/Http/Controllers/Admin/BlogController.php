<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class BlogController extends Controller
{
    
    public function index()
    {
        $admin_id = Session::get('admin_id');
        if($admin_id == null)
        {
            return redirect('admin/login');
        }
        $blogs = Blog::get();
        return view('admin.blog.index',compact('blogs'));
    }

    public function remove($id)
    {
        $admin_id = Session::get('admin_id');
        if($admin_id == null)
        {
            return redirect('admin/login');
        }
        $blog = Blog::find($id);
        $blog->delete();
        File::delete(public_path('front/blog/'.$blog->thumb));
        return redirect()->back();
    }

    public function updatePublished($id)
    {
        $admin_id = Session::get('admin_id');
        if($admin_id == null)
        {
            return redirect('admin/login');
        }
        $blog = Blog::find($id);
        if($blog->published == 1) {
            $blog->update(['published'=>0]);
        } else {
            $blog->update(['published'=>1]);
        }
        return redirect()->back();
    }

    public function add()
    {
        $admin_id = Session::get('admin_id');
        if($admin_id == null)
        {
            return redirect('admin/login');
        }
        return view('admin.blog.add');
    }

    public function post(Request $request)
    {
        $slug = Str::slug($request->title.' '.mt_rand(10000, 99999),'-');
        $data = $request->all();
        $data['alias'] = $slug;
        $data['published'] = $request->has('published') ? 1 : 0;

        $img = $request->file('image');
        $exten = $img->getClientOriginalExtension();
        $filename = pathinfo($img, PATHINFO_FILENAME);
        $newname = $filename.mt_rand(10000, 99999);
        $request->file('image')->move(public_path('front/blog'), $newname.'.'.$exten);
        
        $data['thumb'] = $newname.'.'.$exten;
        unset($data['image']);
        Blog::create($data);

        return redirect()->back()->with('success','Thêm blog thành công');
    }

    public function edit($id)
    {
        $admin_id = Session::get('admin_id');
        if($admin_id == null)
        {
            return redirect('admin/login');
        }
        $blog = Blog::find($id);
        return view('admin.blog.edit',compact('blog'));
    }

    public function update($id,Request $request)
    {
        $admin_id = Session::get('admin_id');
        if($admin_id == null)
        {
            return redirect('admin/login');
        }

        $slug = Str::slug($request->title.' '.mt_rand(10000, 99999),'-');
        $data = $request->all();
        $data['alias'] = $slug;
        $data['published'] = $request->has('published') ? 1 : 0;
        if($request->hasFile('image')){
            $img = $request->file('image');
            $exten = $img->getClientOriginalExtension();
            $filename = pathinfo($img, PATHINFO_FILENAME);
            $newname = $filename.mt_rand(10000, 99999);
            $request->file('image')->move(public_path('front/blog'), $newname.'.'.$exten);
            $data['thumb'] = $newname.'.'.$exten;
            unset($data['image']);
        }
        Blog::find($id)->update($data);
        return redirect()->back()->with('success','Cập nhập blog thành công');
    }
}
