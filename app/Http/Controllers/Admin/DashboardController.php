<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    public function index()
    {
        $admin_id = Session::get('admin_id');
        if($admin_id == null)
        {
            return redirect('admin/login');
        }
        $totalOrders = Order::count();
        $storesWithLevelTwo = User::where('level', 2)->count();
        $blog = Blog::count();
        $coupon = Coupon::count();
        return view('admin.dashboard.index', compact('totalOrders', 'storesWithLevelTwo', 'blog', 'coupon'));
    }
}