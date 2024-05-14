<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Service\Product\ProductServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    private $productService;

    public function __construct(
        ProductServiceInterface $productService
    ) {
        $this->productService = $productService;
    }

    public function viewCart()
    {
        $carts = Session::get('cart');
        // dd($carts);
        return view('front.cart.index', compact('carts'));
    }
    public function add(Request $request)
    {
        $product = $this->productService->find($request->product_id);
        if ($product->stocks <= 0 || $request->product_qty > $product->stocks) {
            $response['error'] = "Sản phẩm này đã hết hàng";
            return $response;
        }
        $sessionId = substr(md5(microtime()), rand(0, 26), 5);
        $cart = Session::get('cart');
        if ($cart != null) {
            $is_avaiable = 0;
            foreach ($cart as $key => $val) {
                if ($val['product_id'] == $request->product_id) {
                    $is_avaiable++;
                    $cart[$key]['product_qty'] = $cart[$key]['product_qty'] + $request->product_qty;
                    $cart[$key]['product_total'] = $cart[$key]['product_qty'] * $cart[$key]['product_price'];
                }
            }
            if ($is_avaiable == 0) {
                $cart[] = array(
                    'session_id' => $sessionId,
                    'product_name' => $product->product_name,
                    'product_id' => $product->id,
                    'product_stocks' => $product->stocks,
                    'product_price' => $product->discount ?? $product->price,
                    'product_image' => $product->productImage[0]->path,
                    'product_qty' => $request->product_qty,
                    'product_unit' => $product->unit,
                    'product_total' => $product->discount != null
                        ? $product->discount * $request->product_qty
                        : $product->price * $request->product_qty,
                    'shop_id' => $product->shop_id,
                );
                Session::put('cart', $cart);
            }
        } else {
            $cart[] = array(
                'session_id' => $sessionId,
                'product_name' => $product->product_name,
                'product_id' => $product->id,
                'product_stocks' => $product->stocks,
                'product_price' => $product->discount ?? $product->price,
                'product_image' => $product->productImage[0]->path,
                'product_qty' => $request->product_qty,
                'product_unit' => $product->unit,
                'product_total' => $product->discount != null
                    ? $product->discount * $request->product_qty
                    : $product->price * $request->product_qty,
                'shop_id' => $product->shop_id,
            );
        }
        Session::put('cart', $cart);
        Session::save();
        $response['cart_count'] = count(Session::get('cart'));
        $response['error'] = null;
        return $response;
    }

    public function destroyCart()
    {
        Session::forget('cart');
        Session::forget('coupon');
        Session::save();
        return redirect()->back();
    }

    public function countTotal()
    {
        $carts = Session::get('cart');
        $total = 0;
        foreach ($carts as $val) {
            $total += $val['product_total'];
        }
        return $total;
    }

    public function remove(Request $request)
    {
        $sessionId = $request->session_id;
        $carts =  Session::get('cart');
        if ($carts != null) {
            foreach ($carts as $key => $val) {
                if ($val['session_id'] == $sessionId) {
                    unset($carts[$key]);
                }
            }
            Session::put('cart', $carts);
            Session::save();
        }
        $response['cart_count'] = $carts != null ? count($carts) : 0;
        return $response;
    }

    public function update(Request $request)
    {
        $sessionId = $request->session_id;
        $qty = $request->value;
        $carts =  Session::get('cart');
        if ($carts != null) {
            foreach ($carts as $key => $val) {
                if ($val['session_id'] == $sessionId) {
                    $carts[$key]['product_qty'] = $qty;
                    $carts[$key]['product_total'] = $carts[$key]['product_price'] * $qty;
                    $response['product_total'] = $carts[$key]['product_total'];
                }
            }
            Session::put('cart', $carts);
            Session::save();
        }
        return $response;
    }

    public function loadCartTotal()
    {
        $carts = Session::get('cart');
        $coupon = Session::get('coupon');
        $total = 0;
        foreach ($carts as $val) {
            $total += $val['product_total'];
        }
        if ($coupon) {
            if ($total < $coupon['coupon_condition']) {
                Session::forget('coupon');
                Session::save();
                $coupon = null;
            }
        }
        return view('ajax.cart_total', compact('total', 'coupon'));
    }

    public function checkCoupon(Request $request)
    {
        $code = Coupon::where('code', $request->code)->first();
        $total = $this->countTotal();
        $coupon = Session::get('coupon');
        $now = date('Y-m-d');
        if ($code) {
            if ($coupon) {
                $response['notify'] = 'danger';
                $response['message'] = "Chỉ sử dụng được một mã khuyến mãi";
                return $response;
            } else {
                if ($code->expire_date <  $now) {
                    $response['notify'] = 'danger';
                    $response['message'] = "Mã khuyến mãi đã hết hạn";
                    return $response;
                }
                else {
                    if ($code->quantity <= 0) {
                        $response['notify'] = 'danger';
                        $response['message'] = "Mã khuyến mãi đã hết lượt sử dụng";
                        return $response;
                    } else {
                        if ($total >= $code->total_order) {
                            $newCoupon = array(
                                'coupon_id' => $code->id,
                                'coupon_name' => $code->name,
                                'coupon_code' => $code->code,
                                'coupon_type' => $code->type,
                                'coupon_value' => $code->value,
                                'max_discount' => $code->max_discount,
                                'coupon_expire' => $code->expire_date,
                                'coupon_condition' => $code->total_order
                            );
                            Session::put('coupon', $newCoupon);
                            Session::save();

                            $response['notify'] = 'success';
                            $response['message'] = "Sử dụng mã khuyến mãi thành công";
                            return $response;
                        } else {
                            $condition = number_format($code->total_order, 0);
                            $response['notify'] = 'danger';
                            $response['message'] = "Mã khuyến mãi này chỉ được sử dụng với đơn hàng trên $condition đ";
                            return $response;
                        }
                    }
                }
            }
        } else {
            $response['notify'] = 'danger';
            $response['message'] = "Mã khuyến mãi không tồn tại";
            return $response;
        }
    }

    public function loadCoupon()
    {
        $coupon = Session::get('coupon');
        $total = $this->countTotal();
        if ($coupon) {
            if ($total < $coupon['coupon_condition']) {
                Session::forget('coupon');
                Session::save();
                $coupon = null;
            }
        }
        return view('ajax.load_coupon_used', compact('coupon'));
    }

    public function removeCoupon()
    {
        Session::forget('coupon');
        Session::save();
    }
}