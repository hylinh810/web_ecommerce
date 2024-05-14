<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class BuyerCouponController extends Controller
{
    public function index()
    {
        $buyer_id = Session::get('buyer_id');
        if ($buyer_id == null) {
            return redirect('buyer/login-shop');
        }
        $coupons = Coupon::where('shop_id', $buyer_id)->get();
        $shop = User::where('id', $buyer_id)->first();
        
        return view('buyer.coupon.index', compact('coupons', 'shop'));
    }

    public function add()
    {
        $buyer_id = Session::get('buyer_id');
        if ($buyer_id == null) {
            return redirect('buyer/login-shop');
        }
        $shop = User::where('id', $buyer_id)->first();
        
        return view('buyer.coupon.add', compact('shop'));
    }

    public function post(Request $request)
    {
        $buyer_id = Session::get('buyer_id');
        if ($buyer_id == null) {
            return redirect('buyer/login-shop');
        }
        $max_discount = 0;
        if ($request->max_discount == null || $request->max_discount == '' || empty($request->max_discount)) {
            $max_discount = 0;
        } else {
            $max_discount = $request->max_discount;
        }
        Coupon::create([
            'name' => $request->name,
            'code' => Str::upper($request->code),
            'type' => $request->type,
            'expire_date' => $request->expire_date,
            'quantity' => $request->quantity,
            'value' => $request->value,
            'max_discount' => $request->type == 1 ? $max_discount : null,
            'total_order' => $request->total_order,
            'shop_id' => $buyer_id
        ]);
        return redirect()->back()->with('success', 'Thêm mã khuyến mãi thành công');
    }

    public function remove($id)
    {
        $buyer_id = Session::get('buyer_id');
        if ($buyer_id == null) {
            return redirect('buyer/login-shop');
        }
        $coupon = Coupon::where('shop_id', $buyer_id)->find($id)->delete();
        return redirect()->back();
    }

    public function edit($id)
    {
        $buyer_id = Session::get('buyer_id');
        if ($buyer_id == null) {
            return redirect('buyer/login-shop');
        }
        $coupon = Coupon::where('shop_id', $buyer_id)->find($id);
        $shop = User::where('id', $buyer_id)->first();
        
        return view('buyer.coupon.edit', compact('coupon', 'shop'));
    }

    public function update($id, Request $request)
    {
        $buyer_id = Session::get('buyer_id');
        if ($buyer_id == null) {
            return redirect('buyer/login-shop');
        }
        $max_discount = 0;
        if ($request->max_discount == null || $request->max_discount == '' || empty($request->max_discount)) {
            $max_discount = 0;
        } else {
            $max_discount = $request->max_discount;
        }
        $coupon = Coupon::find($id)->update([
            'name' => $request->name,
            'code' => Str::upper($request->code),
            'type' => $request->type,
            'expire_date' => $request->expire_date,
            'quantity' => $request->quantity,
            'value' => $request->value,
            'max_discount' => $request->type == 1 ? $max_discount : null,
            'total_order' => $request->total_order
        ]);
        return redirect()->back()->with('success', 'Cập nhập thông tin thành công');
    }
}