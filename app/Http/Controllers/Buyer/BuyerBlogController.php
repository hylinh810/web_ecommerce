<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
class BuyerBlogController extends Controller
{
    public function index()
    {
        $buyer_id = Session::get('buyer_id');
        if ($buyer_id == null) {
            return redirect('buyer/login-shop');
        }
        $blogs = Blog::where('shop_id', $buyer_id)->get();
        $shop = User::where('id', $buyer_id)->first();
        
        return view('buyer.blog.index', compact('blogs', 'shop'));
        
    }

    public function remove($id)
    {
        $buyer_id = Session::get('buyer_id');
        if ($buyer_id == null) {
            return redirect('buyer/login-shop');
        }
        $blog = Blog::where('shop_id', $buyer_id)->find($id);
        $blog->delete();
        File::delete(public_path('front/blog/' . $blog->thumb));
        
        return redirect()->back();
    }

    public function updatePublished($id)
    {
        $buyer_id = Session::get('buyer_id');
        if ($buyer_id == null) {
            return redirect('buyer/login-shop');
        }
        $blog = Blog::where('shop_id', $buyer_id)->find($id);
        if ($blog->published == 1) {
            $blog->update(['published' => 0]);
        } else {
            $blog->update(['published' => 1]);
        }
        return redirect()->back();
    }

    public function add()
    {
        $buyer_id = Session::get('buyer_id');
        if ($buyer_id == null) {
            return redirect('buyer/login-shop');
        }
        $shop = User::where('id', $buyer_id)->first();
        return view('buyer.blog.add', compact('shop'));
    }

    public function post(Request $request)
    {
        $buyer_id = Session::get('buyer_id');
        $slug = Str::slug($request->title . ' ' . mt_rand(10000, 99999), '-');
        $data = $request->all();
        $data['shop_id'] = $buyer_id;
        $data['alias'] = $slug;
        $data['published'] = $request->has('published') ? 1 : 0;

        $img = $request->file('image');
        $exten = $img->getClientOriginalExtension();
        $filename = pathinfo($img, PATHINFO_FILENAME);
        $newname = $filename . mt_rand(10000, 99999);
        $request->file('image')->move(public_path('front/blog'), $newname . '.' . $exten);

        $data['thumb'] = $newname . '.' . $exten;
        unset($data['image']);
        Blog::create($data);

        return redirect()->back()->with('success', 'Thêm blog thành công');
    }

    public function edit($id)
    {
        $buyer_id = Session::get('buyer_id');
        if ($buyer_id == null) {
            return redirect('buyer/login-shop');
        }
        $blog = Blog::where('shop_id', $buyer_id)->find($id);
        $shop = User::where('id', $buyer_id)->first();
        
        return view('buyer.blog.edit', compact('blog', 'shop'));
    }

    public function update($id, Request $request)
    {
        $buyer_id = Session::get('buyer_id');
        if ($buyer_id == null) {
            return redirect('buyer/login-shop');
        }

        $slug = Str::slug($request->title . ' ' . mt_rand(10000, 99999), '-');
        $data = $request->all();
        $data['alias'] = $slug;
        $data['published'] = $request->has('published') ? 1 : 0;
        if ($request->hasFile('image')) {
            $img = $request->file('image');
            $exten = $img->getClientOriginalExtension();
            $filename = pathinfo($img, PATHINFO_FILENAME);
            $newname = $filename . mt_rand(10000, 99999);
            $request->file('image')->move(public_path('front/blog'), $newname . '.' . $exten);
            $data['thumb'] = $newname . '.' . $exten;
            unset($data['image']);
        }
        Blog::where('shop_id', $buyer_id)->find($id)->update($data);
        return redirect()->back()->with('success', 'Cập nhập blog thành công');
    }
}