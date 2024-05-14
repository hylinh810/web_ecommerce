<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
class CategoryController extends Controller
{
    public function index()
    {
        $admin_id = Session::get('admin_id');
        if($admin_id == null)
        {
            return redirect('admin/login');
        }
        $categories = Category::get();
        return view('admin.category.index',compact('categories'));
    }

    public function add() {
        $admin_id = Session::get('admin_id');
        if($admin_id == null)
        {
            return redirect('admin/login');
        }
        return view('admin.category.add');
    }

    public function post(Request $request) {
        $slug = Str::slug($request->name.' '.mt_rand(10000, 99999),'-');
        Category::create([
            'name' => Str::ucfirst($request->name),
            'description' => $request->description,
            'published' => $request->has('published') ? 1 : 0,
            'alias' => $slug
        ]);
        return redirect()->back()->with('success','Thêm danh mục thành công');
    }

    public function remove($id) {
        $admin_id = Session::get('admin_id');
        if($admin_id == null)
        {
            return redirect('admin/login');
        }
        $product = Product::where('cate_id',$id)->get();
        if(count($product) > 0) {
            return redirect()->back()->with('danger','Lỗi! Danh mục này đã có sản phẩm, vui lòng xoá sản phẩm trước');
        } else {
            $shipper = Category::find($id)->delete();
            return redirect()->back();
        }
    }

    public function edit($id) {
        $admin_id = Session::get('admin_id');
        if($admin_id == null)
        {
            return redirect('admin/login');
        }
        $category = Category::find($id);
        return view('admin.category.edit',compact('category'));
    }

    public function update($id, Request $request){
        $slug = Str::slug($request->name.' '.mt_rand(10000, 99999),'-');
        Category::find($id)->update([
            'name' => Str::ucfirst($request->name),
            'description' => $request->description,
            'published' => $request->has('published') ? 1 : 0,
            'alias' => $slug
        ]);
        return redirect()->back()->with('success','Cập nhập thông tin thành công');
    }

    public function updatePublished($id) {
        $admin_id = Session::get('admin_id');
        if($admin_id == null)
        {
            return redirect('admin/login');
        }

        $category = Category::find($id);
        $products = Product::where('cate_id',$id)->get();
        if($category->published == 1) {
            $category->update(['published'=>0]);
            foreach($products as $product) {
                Product::find($product->id)->update(['published' => 0]);
            }
        } else {
            $category->update(['published'=>1]);
            foreach($products as $product) {
                Product::find($product->id)->update(['published' => 1]);
            }
        }
        return redirect()->back();
    }
}
