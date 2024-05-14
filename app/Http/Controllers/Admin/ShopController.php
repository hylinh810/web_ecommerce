<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Mail\ShopConfirmationMail;
use Illuminate\Support\Facades\Mail\ShopLocked;


class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admin_id = Session::get('admin_id');
        if ($admin_id == null) {
            return redirect('admin/login');
        }
        $shops = User::where('level', 2)->get();
        return view('admin.shop.index', compact('shops'));
    }

    
    public function edit($id)
    {
        $admin_id = Session::get('admin_id');
        if ($admin_id == null) {
            return redirect('admin/login');
        }
        $shop = User::find($id);
        return view('admin.shop.edit', compact('shop'));
    }
    public function update($id, Request $request)
    {
        $admin_id = Session::get('admin_id');
        if ($admin_id == null) {
            return redirect('admin/login');
        }
        $shop = User::find($id);
        
        if ($shop->status == 'Chờ xác nhận') {
            User::where('id', $id)
                ->where('status', 'Chờ xác nhận')
                ->update(['status' => 'Đã xác nhận']);

            // Gửi thông báo qua email
            $this->sendShopConfirmationEmail($shop);

            return redirect('/admin/shop')->with('success', 'Cửa hàng đã được xác nhận.');
        } elseif($shop->status == 'Đã xác nhận'){
            User::where('id', $id)
                ->where('status', 'Đã xác nhận')
                ->update(['status' => 'Đã khoá']);

            // Gửi thông báo qua email
            $this->sendShopLocked($shop);

            return redirect('/admin/shop')->with('success', 'Cửa hàng đã bị khoá.');
        } elseif ($shop->status == 'Đã khoá') {
            User::where('id', $id)
                ->where('status', 'Đã khoá')
                ->update(['status' => 'Đã xác nhận']);

            // Gửi thông báo qua email
            $this->sendShopActivated($shop);

            return redirect('/admin/shop')->with('success', 'Cửa hàng đã được mở.');
        }
        else {
            return redirect()->back()->with('error', 'Cửa hàng không ở trạng thái "Chờ xác nhận".');
        }
    }

    protected function sendShopConfirmationEmail($shop)
    {
        // Gửi thông báo qua email
        // Bạn có thể sử dụng Mail facade hoặc Mail::to()
        // để gửi email với dữ liệu cửa hàng đã được xác nhận
        // Dưới đây là một ví dụ đơn giản:

        Mail::to($shop->email)->send(new \App\Mail\ShopConfirmationMail($shop));
    }

    protected function sendShopLocked($shop)
    {
        // Gửi thông báo qua email
        // Bạn có thể sử dụng Mail facade hoặc Mail::to()
        // để gửi email với dữ liệu cửa hàng đã được xác nhận
        // Dưới đây là một ví dụ đơn giản:

        Mail::to($shop->email)->send(new \App\Mail\ShopLocked($shop));
    }

    protected function sendShopActivated($shop)
    {
        // Gửi thông báo qua email
        // Bạn có thể sử dụng Mail facade hoặc Mail::to()
        // để gửi email với dữ liệu cửa hàng đã được xác nhận
        // Dưới đây là một ví dụ đơn giản:

        Mail::to($shop->email)->send(new \App\Mail\ShopActivated($shop));
    }

    public function remove($id)
    {
        $admin_id = Session::get('admin_id');
        if ($admin_id == null) {
            return redirect('admin/login');
        }
        User::find($id)->delete();
        return redirect()->back();
        
    }

}