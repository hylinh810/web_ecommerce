<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class CustomerController extends Controller
{
    public function index()
    {
        $admin_id = Session::get('admin_id');
        if($admin_id == null)
        {
            return redirect('admin/login');
        }
        $users = User::where('level',0)->get();
        return view('admin.customer.index',compact('users'));
    }

    public function edit($id)
    {
        $admin_id = Session::get('admin_id');
        if ($admin_id == null) {
            return redirect('admin/login');
        }
        $users = User::find($id);
        // dd($users);
        return view('admin.customer.edit', compact('users'));
    }
    public function update($id, Request $request)
    {
        $admin_id = Session::get('admin_id');
        if ($admin_id == null) {
            return redirect('admin/login');
        }
        $users = User::find($id);

        if ($users && $users->status === null) {
            User::where('id', $id)
                ->update(['status' => 'Đã khoá']);

            // Gửi thông báo qua email
            // $this->sendShopLocked($users);

            return redirect('/admin/danh-sach-khach-hang')->with('success', 'Tài khoản đã bị khoá');
        } 
        elseif ($users->status == 'Đã khoá') {
            User::where('id', $id)
                ->where('status', 'Đã khoá')
                ->update(['status' => null]);

            // Gửi thông báo qua email
            // $this->sendShopActivated($users);

            return redirect('/admin/danh-sach-khach-hang')->with('success', 'Tài khoản đã được mở.');
        } else {
            return redirect()->back()->with('error', 'Tài khoản không ở trạng thái "Chờ xác nhận".');
        }
    }


    protected function sendShopLocked($users)
    {
        // Gửi thông báo qua email
        // Bạn có thể sử dụng Mail facade hoặc Mail::to()
        // để gửi email với dữ liệu cửa hàng đã được xác nhận
        // Dưới đây là một ví dụ đơn giản:

        Mail::to($users->email)->send(new \App\Mail\ShopLocked($users));
    }

    protected function sendShopActivated($users)
    {
        // Gửi thông báo qua email
        // Bạn có thể sử dụng Mail facade hoặc Mail::to()
        // để gửi email với dữ liệu cửa hàng đã được xác nhận
        // Dưới đây là một ví dụ đơn giản:

        Mail::to($users->email)->send(new \App\Mail\ShopActivated($users));
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