<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class BuyerDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shop_id = Session::get('buyer_id');
        if ($shop_id == null) {
            return redirect('buyer/login-shop');
        }
        $unconfirmedOrdersCount = Order::where('shop_id', $shop_id)
        ->where('status', 'Chờ xác nhận') // Adjust the status condition as per your database schema
        ->count();

        $successOrdersCount = Order::where('shop_id', $shop_id)
        ->where('status', 'Đã giao hàng') // Adjust the status condition as per your database schema
        ->count();
        $totalStock = $this->calculateTotalStockForShop($shop_id);

        $successfulOrders = Order::where('shop_id', $shop_id)->where('status', 'Đã giao hàng')->get();
        $totalRevenue = $successfulOrders->sum('total');

        // Fetch successful orders with date
        $successfulOrders = Order::where('shop_id', $shop_id)
        ->where('status', 'Đã giao hàng')
        ->whereNotNull('ship_date') // Assuming you have a completion date field
        ->get();

        // Group orders by month
        $monthlyRevenue = $successfulOrders->groupBy(function ($order) {
            $completedAt = $order->ship_date;

            // Check if completed_at is a string, convert it to DateTime
            if (is_string($completedAt)) {
                $completedAt = new DateTime($completedAt);
            }

            return optional($completedAt)->format('Y-m'); // Use optional() to prevent errors on null
        });

        // Extract month names and revenue values
        $months = [];
        $revenue = [];

        foreach ($monthlyRevenue as $month => $orders) {
            $months[] = $month;
            $revenue[] = $orders->sum('total');
        }

        $shop = User::where('id', $shop_id)->first();


        return view('buyer.dashboard.index', compact('unconfirmedOrdersCount', 'totalStock', 'successOrdersCount','totalRevenue', 'months', 'revenue', 'shop'));
    }

    public function calculateTotalStockForShop($shopId)
    {
        // Assuming there's a 'shop_id' column in the 'products' table
        $totalBlogs = Product::where('shop_id', $shopId)->sum('stocks');

        return $totalBlogs;
    }

    public function calculateTotalBlogs($shopId)
    {
        // Assuming there's a 'shop_id' column in the 'products' table
        $totalStock = Blog::where('shop_id', $shopId)->count();

        return $totalStock;
    }

    public function getSalesData()
    {
        $buyer_id = Session::get('buyer_id');
        if ($buyer_id == null) {
            return redirect('buyer/login-shop');
        }
        // Replace this with your actual logic to fetch sales data
        $revenueData = Order::select(DB::raw('MONTH(order_date) as month'), DB::raw('SUM(total) as total_revenue'))
        ->where('shop_id', $buyer_id)
        ->where('status', 'Đã giao hàng')
        ->groupBy('month')
        ->get();

        // Fetch remaining stock grouped by month
        $stockData = Product::select(DB::raw('MONTH(created_at) as month'), DB::raw('SUM(stocks) as total_stock'))
        ->groupBy('month')
        ->get();

        return response()->json(['revenueData' => $revenueData, 'stockData' => $stockData]);
    }
    
}