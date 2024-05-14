<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Hamcrest\Core\Set;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index()
    {
        // dd(md5('12345678')) ;
        // dd(bcrypt('12345678'));
        return view('admin.login');
    }


    public function checkLogin(Request $request)
    {
        $email = $request->email;
        $password = md5($request->password);
        $admin = User::where('email',$email)->where('password',$password)->where('level',1)->first();
        if($admin != null) {
            Session::put('admin_id',$admin->id);
            Session::put('admin_name',$admin->name);
            Session::save();
            return redirect('admin/dashboard');
        } else {
            return redirect()->back()->with('erroradmin','Thông tin đăng nhập không chính xác' );
        }
    }

    public function logout()
    {
        Session::forget('admin_id');
        Session::forget('admin_name');
        Session::save();
        return redirect('admin/login');
    }
}