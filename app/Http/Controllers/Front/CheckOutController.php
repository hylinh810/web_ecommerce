<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Coupon;
use App\Models\District;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\Ward;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Utilities\VNPay;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use App\Service\Product\ProductServiceInterface;

class CheckOutController extends Controller
{
    public function countTotal() 
    {
        $carts = Session::get('cart');
        $total = 0;
        if($carts) {
            foreach($carts as $val)
            {
                $total += $val['product_total'];
            }
            return $total;
        }
        return 0;
    }

    public function index()
    {
        $coupon = Session::get('coupon');
        $carts = Session::get('cart');
        $total = $this->countTotal();

        $cities = City::get();
        return view('front.checkout.index',compact('coupon','carts','total','cities'));
    }

    public function loadDistrict(Request $request) 
    {
        $cityId = $request->city_id;
        $districts = District::where('city_id',$cityId)->get();
        $response = "";
        foreach($districts as $district) {
            $response .= '<option value="'.$district->id.'">'.$district->name.'</option>';
        }
        return $response;
    }

    public function loadWard(Request $request) 
    {
        $district_id = $request->district_id;
        $wards = Ward::where('district_id',$district_id)->get();
        $response = "";
        foreach($wards as $ward) {
            $response .= '<option value="'.$ward->id.'">'.$ward->name.'</option>';
        }
        return $response;
    }

    public function addOrder(Request $request)
    {
        $bytes = bin2hex(random_bytes(20));
        $order_code = substr($bytes, rand(0, 26), 10);
        $coupon = Session::get('coupon');
        $carts = Session::get('cart');
        $discount = 0;

        Validator::make($request->all(), [
            'address' => 'required|string'
        ]);

        $outOfStock = 0;
        $notify = 'Sản phẩm ';

        foreach ($carts as $key => $cart) {
            $inventory = Product::find($cart['product_id']);

            if ($cart['product_qty'] > $inventory->stocks) {
                $outOfStock++;
                $notify .= '' . $carts[$key]['product_name'] . ', ';
            }
        }

        $notify .= 'không đủ hàng tồn kho để đặt hàng';

        if ($outOfStock != 0) {
            return redirect()->back()->with('outofstock', $notify);
        }

        if ($coupon) {
            if ($coupon['coupon_type'] == 1) {
                $discount = ($cart['product_price'] * $coupon['coupon_value']) / 100;
                if ($discount > $coupon['max_discount']) {
                    $discount = $coupon['max_discount'];
                }
            } else {
                $discount = $coupon['coupon_value'];
            }
        }

        $now = now();
        $orderDetails = [];

        foreach ($carts as $cart) {
            $product = Product::find($cart['product_id']);
            $shopId = $product->shop_id;

            if (!isset($orderDetails[$shopId])) {
                // Nếu shop chưa có trong danh sách, thêm vào
                $orderDetails[$shopId] = [
                    'order_id' => null,
                    'total' => 0,
                ];
            }

            $orderDetails[$shopId]['total'] += $cart['product_total'];

            // Tạo order nếu chưa có
            if ($orderDetails[$shopId]['order_id'] === null) {
                $order = Order::create([
                    'order_code' => $order_code,
                    'user_id' => Auth::user()->id,
                    'order_date' => $now,
                    'ship_date' => null,
                    'status' => 'Chờ xác nhận',
                    'deleted' => 0,
                    'payment_id' => $request->payment_id,
                    'paid' => 0,
                    'pay_date' => null,
                    'note' => $request->note,
                    'shipper_id' => null,
                    'city' => $request->city,
                    'district' => $request->district,
                    'ward' => $request->ward,
                    'address' => $request->address,
                    'subtotal' => $cart['product_price'],
                    'discount' => $discount,
                    'total' => 0,
                    'shop_id' => $shopId,
                ]);

                $orderDetails[$shopId]['order_id'] = $order->id;

                if ($request->payment_id == 2) {
                    $data_url = VNPay::vnpay_create_payment([
                        'vnp_TxnRef' =>  $order_code . $order->id,
                        'vnp_OrderInfo' => "Thanh toán đơn hàng orgarnicshop",
                        'vnp_Amount' => $cart['product_price'] - $discount,
                    ]);

                    return redirect()->to($data_url);
                } else {
                    foreach ($carts as $cart) {
                        $product = Product::where('id', $cart['product_id'])->first();
                        if ($product->stocks <= $cart['product_qty']) {
                            $updateStock = Product::where('id', $cart['product_id'])->update(['stocks' => 0]);
                        } else {
                            $updateStock = Product::where('id', $cart['product_id'])->update(['stocks' => $product->stocks - $cart['product_qty']]);
                        }
                        $data = [
                            'order_id' => $orderDetails[$shopId]['order_id'],
                            'product_id' => $cart['product_id'],
                            'quantity' => $cart['product_qty'],
                            'total' => $cart['product_total']
                        ];
                        OrderDetail::create($data);
            }
        }
    }

            

            
        }

        // Cập nhật giá trị tổng cộng cho mỗi đơn hàng
        foreach ($orderDetails as $shopId => $orderDetail) {
            Order::where('id', $orderDetail['order_id'])->update([
                'subtotal' => $orderDetail['total'],
                'total' => $orderDetail['total'] - $discount,
            ]);
        }

        if ($coupon != null) {
            $code = Coupon::where('code', $coupon['coupon_code'])->first();
            $descQtyCoupon = Coupon::where('code', $coupon['coupon_code'])->update(['quantity' => $code->quantity - 1]);
        }

        Session::forget('cart');
        Session::forget('coupon');
        Session::save();

        return redirect('thong-tin-ca-nhan/don-hang/' . $order_code);
    }



    public function vnPayCheck(Request $request)
    {
        $vnp_ResponseCode = $request->get('vnp_ResponseCode');
        $vnp_TxnRef = $request->get('vnp_TxnRef');
        $vnp_Amount = $request->get('vnp_Amount');
        $subtotal = $this->countTotal();
        $coupon = Session::get('coupon');
        $carts = Session::get('cart');
        $order_id = substr($vnp_TxnRef, 10);
        $now = date(now());

        if($vnp_ResponseCode != null){
            if($vnp_ResponseCode == 00) {
                $updateOrder = Order::where('id',$order_id)->update(['paid' => 1, 'pay_date'=>$now]);

                foreach($carts as $cart) {
                    $product = Product::where('id',$cart['product_id'])->first();
                    if($product->stocks <= $cart['product_qty']) {
                        $updateStock = Product::where('id',$cart['product_id'])->update(['stocks'=> 0]);
                    } else {
                        $updateStock = Product::where('id',$cart['product_id'])->update(['stocks'=> $product->stocks - $cart['product_qty']]);
                    }
                    
                    $data = [
                        'order_id' => $order_id,
                        'product_id' => $cart['product_id'],
                        'quantity' => $cart['product_qty'],
                        'total' => $cart['product_total']
                    ];
                    OrderDetail::create($data);
                }

                if($coupon != null) {
                    $code = Coupon::where('code',$coupon['coupon_code'])->first();
                    $descQtyCoupon = Coupon::where('code',$coupon['coupon_code'])->update(['quantity' => $code->quantity - 1]);$code = Coupon::where('code',$coupon['coupon_code'])->first();
                }
        
                Session::forget('cart');
                Session::forget('coupon');
                Session::save();
                $order = Order::where('id',$order_id)->first();
                $this->sendMail(Auth::user()->email,$order);
                return redirect('check-out/result')->with('success','Thanh toán đơn hàng thành công! Vui lòng kiểm tra email');
            } else {
                $deleteOrder = Order::where('id',$order_id)->delete();
                return redirect('check-out/result')->with('error','Thanh toán đơn hàng thất bại!');
            }
        }
    }

    public function result()
    {
        return view('front.checkout.result');
    }

    public function sendMail($email, $order)
    {
        $email_to = $email;
        Mail::send('front.checkout.email',compact('order'),
        function ($message) use ($email_to){
            $message->from('htylinh.19it3@vku.udn.vn','Organic Shop');
            $message->to($email_to, $email_to);
            $message->subject('Thông tin đơn hàng');
        });
    }

}