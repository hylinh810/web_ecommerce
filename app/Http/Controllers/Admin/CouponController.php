<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

class CouponController extends Controller
{
    public function index()
    {
        $admin_id = Session::get('admin_id');
        if($admin_id == null)
        {
            return redirect('admin/login');
        }
        $coupons = Coupon::get();
        return view('admin.coupon.index',compact('coupons'));
    }

    public function add()
    {
        $admin_id = Session::get('admin_id');
        if($admin_id == null)
        {
            return redirect('admin/login');
        }
        return view('admin.coupon.add');
    }

    public function post(Request $request)
    {
        $admin_id = Session::get('admin_id');
        if($admin_id == null)
        {
            return redirect('admin/login');
        }
        $max_discount = 0;
        if($request->max_discount == null || $request->max_discount == '' || empty($request->max_discount)) {
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
            'total_order' => $request->total_order
        ]);
        return redirect()->back()->with('success','Thêm mã khuyến mãi thành công');
    }

    public function remove($id) {
        $admin_id = Session::get('admin_id');
        if($admin_id == null)
        {
            return redirect('admin/login');
        }
        $coupon = Coupon::find($id)->delete();
        return redirect()->back();
        
    }

    public function edit($id)
    {
        $admin_id = Session::get('admin_id');
        if($admin_id == null)
        {
            return redirect('admin/login');
        }
        $coupon = Coupon::find($id);
        return view('admin.coupon.edit',compact('coupon'));
    }

    public function update($id, Request $request)
    {
        $admin_id = Session::get('admin_id');
        if($admin_id == null)
        {
            return redirect('admin/login');
        }
        $max_discount = 0;
        if($request->max_discount == null || $request->max_discount == '' || empty($request->max_discount)) {
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
        return redirect()->back()->with('success','Cập nhập thông tin thành công');
    }
}
