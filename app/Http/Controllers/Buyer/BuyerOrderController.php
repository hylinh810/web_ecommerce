<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Shipper;
use Illuminate\Foundation\Auth\User;

class BuyerOrderController extends Controller
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
        $orders = Order::with('orderDetails')->where('shop_id', $buyer_id)->where('status', '!=', 'Đã giao hàng')->get();

        $shop = User::where('id', $buyer_id)->first();
        
        // dd($orders);
        return view('buyer.order.index', compact('orders', 'shop'));
    }

    public function success()
    {
        $buyer_id = Session::get('buyer_id');
        if ($buyer_id == null) {
            return redirect('buyer/login-shop');
        }
        $orders = Order::where('shop_id', $buyer_id)->where('status', 'Đã giao hàng')->get();
        $shop = User::where('id', $buyer_id)->first();
        
        return view('buyer.order.index', compact('orders', 'shop'));
    }

    public function remove($id)
    {
        $buyer_id = Session::get('buyer_id');
        if ($buyer_id == null) {
            return redirect('buyer/login-shop');
        }
        $order = Order::where('shop_id', $buyer_id)->find($id);
        $orderDetail = OrderDetail::where('order_id', $id)->get();
        if ($order->status == 'Đã giao hàng') {
            $order = Order::where('shop_id', $buyer_id)->find($id)->delete();
            foreach ($orderDetail as $val) {
                OrderDetail::find($val->id)->delete();
            }
            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        $buyer_id = Session::get('buyer_id');
        if ($buyer_id == null) {
            return redirect('buyer/login-shop');
        }
        $order = Order::where('shop_id', $buyer_id)->find($id);
        $shippers = Shipper::get();
        $shop = User::where('id', $buyer_id)->first();
        return view('buyer.order.update', compact('order', 'shippers', 'shop'));
    }

    public function show($id)
    {
        $buyer_id = Session::get('buyer_id');
        if ($buyer_id == null) {
            return redirect('buyer/login-shop');
        }
        $order = Order::where('shop_id', $buyer_id)->find($id);
        $shop = User::where('id', $buyer_id)->first();
        
        return view('buyer.order.show', compact('order', 'shop'));
    }

    public function update($id, Request $request)
    {
        $buyer_id = Session::get('buyer_id');
        if ($buyer_id == null) {
            return redirect('buyer/login-shop');
        }
        $order = Order::where('shop_id', $buyer_id)->find($id);
        if ($order->status == 'Chờ xác nhận') {
            Order::where('shop_id', $buyer_id)->find($id)->update(['status' => 'Đã xác nhận']);
        } else if ($order->status == 'Đã xác nhận') {

            Order::where('shop_id', $buyer_id)->find($id)->update([
                'status' => 'Đang giao hàng',
                'shipper_id' => $request->shipper_id
            ]);
        } else {
            $paydate = date(now());
            $shipdate = date('Y-m-d');
            Order::where('shop_id', $buyer_id)->find($id)->update(['status' => 'Đã giao hàng', 'paid' => 1, 'pay_date' => $paydate, 'ship_date' =>  $shipdate]);
        }
        return redirect()->back();
    }
}