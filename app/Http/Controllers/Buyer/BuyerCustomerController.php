<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BuyerCustomerController extends Controller
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

        $orders = Order::with('user')
        ->where('shop_id', $buyer_id)
            ->get();

        $userCounts = [];

        foreach ($orders as $order) {
            $userId = $order->user_id;

            if (!isset($userCounts[$userId])) {
                $userCounts[$userId] = [
                    'orderCount' => 0,
                    'orderSuccess' => 0,
                ];
            }

            $userCounts[$userId]['orderCount']++;

            if ($order->status == 'Đã giao hàng') {
                $userCounts[$userId]['orderSuccess']++;
            }
        }

        // Retrieve users associated with the extracted user_ids
        $users = User::whereIn('id', array_keys($userCounts))
            ->where('level', 0)
            ->get();
        $shop = User::where('id', $buyer_id)->first();

        return view('buyer.customer.index', compact('users', 'userCounts', 'shop'));
    }


    
}