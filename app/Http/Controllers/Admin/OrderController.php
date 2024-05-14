<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Shipper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public function index()
    {
        $admin_id = Session::get('admin_id');
        if($admin_id == null)
        {
            return redirect('admin/login');
        }
        $orders = Order::get();
        return view('admin.order.index',compact('orders'));
    }

    public function remove($id)
    {
        $admin_id = Session::get('admin_id');
        if($admin_id == null)
        {
            return redirect('admin/login');
        }
        $order = Order::find($id);
        $orderDetail = OrderDetail::where('order_id',$id)->get();
        if($order->status == 'Đã giao hàng') {
            $order = Order::find($id)->delete();
            foreach($orderDetail as $val) {
                OrderDetail::find($val->id)->delete();
            }
            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        $admin_id = Session::get('admin_id');
        if($admin_id == null)
        {
            return redirect('admin/login');
        }
        $order = Order::find($id);
        $shippers = Shipper::get();
        return view('admin.order.update',compact('order','shippers'));
    }

    public function show($id) {
        $admin_id = Session::get('admin_id');
        if($admin_id == null)
        {
            return redirect('admin/login');
        }
        $order = Order::find($id);
        return view('admin.order.show',compact('order'));
    }

    public function update($id, Request $request) {
        $admin_id = Session::get('admin_id');
        if($admin_id == null)
        {
            return redirect('admin/login');
        }
        $order = Order::find($id);
        if($order->status == 'Chờ xác nhận') {
            Order::find($id)->update(['status' => 'Đã xác nhận']);
        } else if($order->status == 'Đã xác nhận') {
        
            Order::find($id)->update([
                'status' => 'Đang giao hàng',
                'shipper_id' => $request->shipper_id
            ]);
        } else {
            $paydate = date(now());
            $shipdate = date('Y-m-d');
            Order::find($id)->update(['status' => 'Đã giao hàng','paid'=>1,'pay_date'=>$paydate, 'ship_date' =>  $shipdate]);
        }
        return redirect()->back();
    }
}