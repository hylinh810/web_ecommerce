<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\ProductComment;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('orderDetails')->where('user_id', Auth::user()->id)->orderByDesc('id')->get();
        // dd($orders);
        // $productId =OrderDetail::where('product_id', $orders->id)->get();
        // dd($productId);
        return view('front.order.index', compact('orders'));
    }

    public function show($id)
    {
        $order = Order::where('order_code', $id)->first();
        if ($order != null) {
            $checkUser = Order::where('order_code', $id)->where('user_id', Auth::user()->id)->first();
            if ($checkUser != null) {
                // $orderDetail = OrderDetail::where('order_id',$order->id)->product->get();
                return view('front.order.show', compact('order', 'checkUser'));
            } else {
                return view('front.order.show', compact('order', 'checkUser'));
            }
        } else {
            return view('front.order.show', compact('order'));
        }
    }

    public function store(Request $request, $productId, $orderId)
    {
        // dd($orderId);

        // Assuming you have authentication and a logged-in user
        $userId = auth()->user()->id;

        // Create a product comment
        // $productComment = new ProductComment([
        //     'comment' => $request->input('comment_content'),
        //     'user_id' => $userId,
        //     'product_id' => $productId,
        // ]);

        // Save the product comment
        // $productComment->save();

        // Create a rating associated with the product comment
        $rating = new Rating([
            'rating' => $request->input('rating'),
            'user_id' => $userId,
            'product_id' => $productId,
            // 'comment_id' => $productComment->id,
            'order_id' => $orderId,
            'comment' => $request->input('comment_content'),
        ]);

        $rating->save();


        return redirect()->route('order', ['productId' => $productId])
            ->with('success', 'Review submitted successfully!');
    }

    // private function getOrderIdForRating($userId, $productId)
    // {
    //     // Your logic to retrieve the order ID based on user and product
    //     // Replace this with your actual logic to get the order ID
    //     // ...

    //     // For example, assuming you have an Order model
    //     $order = Order::where('user_id', $userId)
    //         ->whereHas('orderDetails', function ($query) use ($productId) {
    //             $query->where('product_id', $productId);
    //         })
    //         ->first();

    //     // Check if the order exists and return the ID, otherwise return null or handle accordingly
    //     return $order ? $order->id : null;
    // }

    
    public function review(Request $request, $productId, $orderId)
    {
        // dd($productId);
        $product = Product::with('productImage')->where('id', $productId)->get();
        // dd($product);
        // dd($orderId);

        return view('front.review.review', compact('productId', 'product', 'orderId'));
    }

    public function feedback(Request $request)
    {
        // dd($productId);
        $orders = Order::with('orderDetails')->where('user_id', Auth::user()->id)->orderByDesc('id')->get();
        
        // dd($orders);
        return view('front.review.index', compact('orders'));
    }
    
}