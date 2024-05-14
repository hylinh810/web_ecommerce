<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\District;
use App\Models\User;
use App\Models\Ward;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class BuyerLoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('buyer.login');
    }

    public function checkLogin(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        $buyer = User::where('email', $email)
        ->where('level', 2)
        // ->where('status', 'Đã xác nhận')
        ->first();

        if ($buyer) {
            if ($buyer->status === 'Đã khoá') {
                return redirect()->back()->with('error', 'Tài khoản đã bị khoá');
            }

            if (Hash::check($password, $buyer->password)) {
                Session::put('buyer_id', $buyer->id);
                Session::put('buyer_name', $buyer->name);
                Session::save();
                return redirect('buyer/dashboard');
            }
        }

        // If the authentication fails for any reason
        return redirect()->back()->with('error', 'Thông tin đăng nhập không chính xác');

    }

    public function logout()
    {
        Session::forget('buyer_id');
        Session::forget('buyer_name');
        Session::save();
        return redirect('buyer/login-shop');
    }

    public function showInformation(){
        $shop_id = Session::get('buyer_id');
        if ($shop_id == null) {
            return redirect('buyer/login-shop');
        }
        $shop = User::where('id', $shop_id)->first();
        // dd($shop);
        return view('buyer.account.index', compact('shop'));
    }

    public function updateProfile(Request $request)
    {
        $shop = User::find(Session::get('buyer_id'));

        // Update user image
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $shop->update(['image' => $imagePath]);
        }

        return redirect()->back()->with('success', 'Cập nhật thông tin thành công');
    }
}