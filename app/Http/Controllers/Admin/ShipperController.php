<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\District;
use App\Models\Order;
use App\Models\Shipper;
use App\Models\Ward;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ShipperController extends Controller
{
    public function index()
    {
        $admin_id = Session::get('admin_id');
        if($admin_id == null)
        {
            return redirect('admin/login');
        }
        $shippers = Shipper::get();
        return view('admin.shipper.index',compact('shippers'));
    }

    public function add() {
        $admin_id = Session::get('admin_id');
        if($admin_id == null)
        {
            return redirect('admin/login');
        }
        $cities = City::get();
        return view('admin.shipper.add',compact('cities'));
    }

    public function post(Request $request) {
        $shipper = Shipper::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
            'city' => $request->city,
            'district' => $request->district,
            'ward' => $request->ward
        ]);
        return redirect()->back()->with('success','Thêm shipper thành công');
    }

    public function remove($id) {
        $admin_id = Session::get('admin_id');
        if($admin_id == null)
        {
            return redirect('admin/login');
        }
        $order = Order::where('shipper_id',$id)->get();
        if(count($order) > 0) {
            return redirect()->back()->with('danger','Lỗi! Hãy xoá đơn hàng có shipper này trước');
        } else {
            $shipper = Shipper::find($id)->delete();
            return redirect()->back();
        }
    }

    public function edit($id) {
        $admin_id = Session::get('admin_id');
        if($admin_id == null)
        {
            return redirect('admin/login');
        }
        $cities = City::get();
        $shipper = Shipper::find($id);
        return view('admin.shipper.edit',compact('shipper','cities'));
    }

    public function update($id,Request $request) 
    {
        $admin_id = Session::get('admin_id');
        if($admin_id == null)
        {
            return redirect('admin/login');
        }
        $shipper = Shipper::find($id)->update($request->all());
        return redirect()->back()->with('success','Cập nhập thông tin thành công');
    }
}
