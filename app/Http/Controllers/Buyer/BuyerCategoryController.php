<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class BuyerCategoryController extends Controller
{
    public function index()
    {
        $buyer_id = Session::get('buyer_id');
        if ($buyer_id == null) {
            return redirect('buyer/login-shop');
        }
        $categories = Category::where('shop_id', $buyer_id)->get();
        $shop = User::where('id', $buyer_id)->first();
        
        return view('buyer.category.index', compact('categories', 'shop'));
    }

    public function add()
    {
        $buyer_id = Session::get('buyer_id');
        if ($buyer_id == null) {
            return redirect('buyer/login-shop');
        }
        $shop = User::where('id', $buyer_id)->first();
        
        return view('buyer.category.add', compact('shop'));
    }

    public function post(Request $request)
    {
        $buyer_id = Session::get('buyer_id');
        $slug = Str::slug($request->name . ' ' . mt_rand(10000, 99999), '-');
        Category::create([
            'name' => Str::ucfirst($request->name),
            'description' => $request->description,
            'published' => $request->has('published') ? 1 : 0,
            'alias' => $slug,
            'shop_id' => $buyer_id
        ]);
        return redirect()->back()->with('success', 'Thêm danh mục thành công');
    }

    public function remove($id)
    {
        $buyer_id = Session::get('buyer_id');
        if ($buyer_id == null) {
            return redirect('buyer/login-shop');
        }
        $product = Product::where('cate_id', $id)->get();
        if (count($product) > 0) {
            return redirect()->back()->with('danger', 'Lỗi! Danh mục này đã có sản phẩm, vui lòng xoá sản phẩm trước');
        } else {
            $shipper = Category::find($id)->delete();
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        $buyer_id = Session::get('buyer_id');
        if ($buyer_id == null) {
            return redirect('buyer/login-shop');
        }
        $category = Category::find($id);
        $shop = User::where('id', $buyer_id)->first();
        return view('buyer.category.edit', compact('category', 'shop'));
    }

    public function update($id, Request $request)
    {
        $buyer_id = Session::get('buyer_id');
        $slug = Str::slug($request->name . ' ' . mt_rand(10000, 99999), '-');
        Category::find($id)->update([
            'name' => Str::ucfirst($request->name),
            'description' => $request->description,
            'published' => $request->has('published') ? 1 : 0,
            'alias' => $slug,
            'shop_id' => $buyer_id
        ]);
        return redirect()->back()->with('success', 'Cập nhập thông tin thành công');
    }

    public function updatePublished($id)
    {
        $buyer_id = Session::get('buyer_id');
        if ($buyer_id == null) {
            return redirect('buyer/login-shop');
        }

        $category = Category::find($id);
        $products = Product::where('cate_id', $id)->get();
        if ($category->published == 1) {
            $category->update(['published' => 0]);
            foreach ($products as $product) {
                Product::find($product->id)->update(['published' => 0]);
            }
        } else {
            $category->update(['published' => 1]);
            foreach ($products as $product) {
                Product::find($product->id)->update(['published' => 1]);
            }
        }
        return redirect()->back();
    }
}