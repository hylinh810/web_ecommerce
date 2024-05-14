<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Industry;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class BuyerProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buyer_id = Session::get('buyer_id');

        if ($buyer_id == null) {
            return redirect('buyer/login-shop');
        }
        $products = Product::where('shop_id', $buyer_id )->get();
        $shop = User::where('id', $buyer_id)->first();
        
        return view('buyer.product.index', compact('products', 'shop'));
    }

    public function remove($id)
    {
        $buyer_id = Session::get('buyer_id');
        if ($buyer_id == null) {
            return redirect('buyer/login-shop');
        }
        $productImg = ProductImage::where('product_id', $id)->get();
        $orderDetail = OrderDetail::where('product_id', $id)->get();
        if (count($orderDetail) > 0) {
            return redirect()->back()->with('danger', 'Lỗi! Hãy xoá đơn hàng có sản phẩm này trước');
        } else {
            Product::find($id)->delete();
            foreach ($productImg as $val) {
                ProductImage::find($val->id)->delete();
                File::delete(public_path('front/img/' . $val->path));
            }
            return redirect()->back();
        }
    }

    public function add()
    {
        $buyer_id = Session::get('buyer_id');
        if ($buyer_id == null) {
            return redirect('buyer/login-shop');
        }
        $categories = Category::where('shop_id', $buyer_id)->get();
        $industries = Industry::get();
        $shop = User::where('id', $buyer_id)->first();
        
        return view('buyer.product.add', compact('categories', 'industries', 'shop'));
    }

    public function post(Request $request)
    {

        $buyer_id = Session::get('buyer_id');
        if ($buyer_id == null) {
            return redirect('buyer/login-shop');
        }
        $slug = Str::slug($request->product_name . ' ' . mt_rand(10000, 99999), '-');
        $data = $request->all();
        $data['alias'] = $slug;
        $data['shop_id'] = $buyer_id;
        $data['featured'] = $request->has('featured') ? 1 : 0;
        $data['published'] = $request->has('published') ? 1 : 0;
        $product = Product::create($data);
    
        if ($request->hasFile('image1')) {
            $img = $request->file('image1');
            $exten = $img->getClientOriginalExtension();
            $filename = pathinfo($img, PATHINFO_FILENAME);
            $newname = $filename . mt_rand(10000, 99999);
            //$path = $request->file('image1')->storeAs($path2,$imgname);
            $request->file('image1')->move(public_path('front/img'), $newname . '.' . $exten);
            ProductImage::create(['product_id' => $product->id, 'path' => $newname . '.' . $exten]);
        }
        if ($request->hasFile('image2')) {
            $img = $request->file('image2');
            $exten = $img->getClientOriginalExtension();
            $filename = pathinfo($img, PATHINFO_FILENAME);
            $newname = $filename . mt_rand(10000, 99999);
            //$path = $request->file('image1')->storeAs($path2,$imgname);
            $request->file('image2')->move(public_path('front/img'), $newname . '.' . $exten);
            ProductImage::create(['product_id' => $product->id, 'path' => $newname . '.' . $exten]);
        }
        if ($request->hasFile('image3')) {
            $img = $request->file('image3');
            $exten = $img->getClientOriginalExtension();
            $filename = pathinfo($img, PATHINFO_FILENAME);
            $newname = $filename . mt_rand(10000, 99999);
            //$path = $request->file('image1')->storeAs($path2,$imgname);
            $request->file('image3')->move(public_path('front/img'), $newname . '.' . $exten);
            ProductImage::create(['product_id' => $product->id, 'path' => $newname . '.' . $exten]);
        }

        return redirect()->back()->with('success', 'Thêm sản phẩm thành công');
    }

    public function edit($id)
    {
        $buyer_id = Session::get('buyer_id');
        if ($buyer_id == null) {
            return redirect('buyer/login-shop');
        }
        $product = Product::where('shop_id', $buyer_id)->find($id);
        $categories = Category::where('shop_id', $buyer_id)->get();
        $industries = Industry::get();
        $shop = User::where('id', $buyer_id)->first();
        
        return view('buyer.product.edit', compact('product', 'categories', 'industries', 'shop'));
    }

    public function update($id, Request $request)
    {
        $buyer_id = Session::get('buyer_id');
        if ($buyer_id == null) {
            return redirect('buyer/login-shop');
        }
        $slug = Str::slug($request->product_name . ' ' . mt_rand(10000, 99999), '-');
        $data = $request->all();
        $data['alias'] = $slug;
        $data['featured'] = $request->has('featured') ? 1 : 0;
        $data['published'] = $request->has('published') ? 1 : 0;
        $product = Product::where('shop_id', $buyer_id)->find($id)->update($data);
        $productImage = ProductImage::where('product_id', $id)->get();
        if ($request->hasFile('image1')) {
            $img = $request->file('image1');
            $exten = $img->getClientOriginalExtension();
            $filename = pathinfo($img, PATHINFO_FILENAME);
            $newname = $filename . mt_rand(10000, 99999);
            //$path = $request->file('image1')->storeAs($path2,$imgname);
            $request->file('image1')->move(public_path('front/img'), $newname . '.' . $exten);
            ProductImage::find($productImage[0]->id)->update(['path' => $newname . '.' . $exten]);
        }
        if ($request->hasFile('image2')) {
            $img = $request->file('image2');
            $exten = $img->getClientOriginalExtension();
            $filename = pathinfo($img, PATHINFO_FILENAME);
            $newname = $filename . mt_rand(10000, 99999);
            //$path = $request->file('image1')->storeAs($path2,$imgname);
            $request->file('image2')->move(public_path('front/img'), $newname . '.' . $exten);
            ProductImage::find($productImage[1]->id)->update(['path' => $newname . '.' . $exten]);
        }
        if ($request->hasFile('image3')) {
            $img = $request->file('image3');
            $exten = $img->getClientOriginalExtension();
            $filename = pathinfo($img, PATHINFO_FILENAME);
            $newname = $filename . mt_rand(10000, 99999);
            //$path = $request->file('image1')->storeAs($path2,$imgname);
            $request->file('image3')->move(public_path('front/img'), $newname . '.' . $exten);
            ProductImage::find($productImage[2]->id)->update(['path' => $newname . '.' . $exten]);
        }

        return redirect()->back()->with('success', 'Cập nhập sản phẩm thành công');
    }

    public function updateFeatured($id)
    {
        $buyer_id = Session::get('buyer_id');
        if ($buyer_id == null) {
            return redirect('buyer/login-shop');
        }

        $product = Product::where('shop_id', $buyer_id)->find($id);
        if ($product->featured == 1) {
            $product->update(['featured' => 0]);
        } else {
            $product->update(['featured' => 1]);
        }
        return redirect()->back();
    }

    public function updatePublished($id)
    {
        $buyer_id = Session::get('buyer_id');
        if ($buyer_id == null) {
            return redirect('buyer/login-shop');
        }

        $product = Product::where('shop_id', $buyer_id)->find($id);
        if ($product->published == 1) {
            $product->update(['published' => 0]);
        } else {
            $product->update(['published' => 1]);
        }
        return redirect()->back();
    }

   
}