<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\District;
use App\Models\User;
use App\Models\Ward;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function signup(Request $request) 
    {
        $messages = [
            'name.required' => 'Vui lòng nhập tên',
            'name.max' => 'Vui lòng nhập tên nhỏ hơn 50 kí tự',
            'email.required' => 'Vui lòng nhập email',
            'email.max' => 'Vui lòng nhập email nhỏ hơn 50 kí tự',
            'email.unique' => 'Email này đã được đăng kí bởi tài khoản khác',
            'email.email' => 'Vui lòng nhập đúng định dạng email',
            'phone.required' => 'Vui lòng nhập số điện thoại',
            'phone.unique' => 'Số điện thoại này đã được đăng kí bởi tài khoản khác',
            'phone.starts_with' => 'Vui lòng nhập số điện thoại đúng định dạng',
            'phone.digits' => 'Vui lòng nhập số điện thoại đúng định dạng',
            'password.required' => 'Vui lòng nhập mật khẩu',
            'password.min' => 'Vui lòng nhập mật khẩu ít nhất 8 kí tự',
            'password.max' => 'Vui lòng nhập mật khẩu nhỏ hơn 50 kí tự',
            'password.confirmed' => 'Xác nhận mật khẩu không khớp'
        ];

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:50',
            'email' => 'required|string|email:rfc,dns|max:50|unique:users',
            'password'=>'required|string|min:8|max:50|confirmed',
            'phone' => 'required|unique:users|starts_with:0|digits:10',
        ],$messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'level' => 0,
            'password' => Hash::make($request->password)
        ]);
        return redirect('dang-nhap')->with('success','Đăng ký thành công! Vui lòng đăng nhập.');
    }

    public function login(Request $request)
    {
        $messages = [
            'email.required' => 'Vui lòng nhập email',
            'password.required' => 'Vui lòng nhập mật khẩu',
            'email.email' => 'Vui lòng nhập email đúng định dạng',
            'email.max' => 'Vui lòng nhập email nhỏ hơn 50 kí tự',
            'password.max' => 'Vui lòng nhập mật khẩu nhỏ hơn 50 kí tự'
        ];

        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email:rfc,dns|max:50',
            'password'=>'required|max:50',
        ],$messages);
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            // Authentication successful
            $user = Auth::user();

            if ($user->status == 'Đã khoá') {
                Auth::logout();
                return redirect('dang-nhap')->with('error', 'Tài khoản đã bị khoá');
            }

            // Continue with your logic for a successful login
            return redirect()->intended('');
        } else {
            // Authentication failed
            return redirect('dang-nhap')->with('error', 'Thông tin đăng nhập không chính xác');
        }

    }

    public function logout() 
    {
        Auth::logout();
        return redirect()->back();
    }

    public function personalInfo()
    {
        $city = City::where('id',Auth::user()->city)->first();
        $district = District::where('id',Auth::user()->district)->first();
        $ward = Ward::where('id',Auth::user()->ward)->first();
        $cities = City::get();
        return view('front.account.index',compact('city','district','ward','cities'));
    }

    public function updateInfo(Request $request) 
    {
        $user = User::find(Auth::id());

        $messages = [
            'email.required' => 'Vui lòng nhập email',
            'email.max' => 'Vui lòng nhập email nhỏ hơn 50 kí tự',
            'email.email' => 'Vui lòng nhập đúng định dạng email',
            'phone.required' => 'Vui lòng nhập số điện thoại',
            'phone.digits' => 'Vui lòng nhập số điện thoại đúng định dạng',
            'phone.starts_with' => 'Vui lòng nhập số điện thoại đúng định dạng'
        ];

        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email:rfc,dns|max:50',
            'phone' => 'required|starts_with:0|digits:10',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ],$messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        $user->update($request->except(['image', '_token']));

        // Update user image
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->storeAs('images', 'profile_picture.' . $request->file('image')->getClientOriginalExtension(), 'public');
            $user->update(['image' => $imagePath]);
        }
        return redirect()->back()->with('success','Cập nhập thông tin thành công');
    }

    public function viewChangePassword() 
    {
        return view('front.account.change_password');
    }

    public function changePassword(Request $request)
    {
        $user_id = Auth::user()->id;
        $messages = [
            'old_password.current_password' => 'Mật khẩu không chính xác',
            'password.required' => 'Vui lòng nhập mật khẩu',
            'password.min' => 'Vui lòng nhập mật khẩu ít nhất 8 kí tự',
            'password.max' => 'Vui lòng nhập mật khẩu nhỏ hơn 50 kí tự',
            'password.confirmed' => 'Xác nhận mật khẩu không khớp'
        ];

        $validator = Validator::make($request->all(), [
            'old_password' => 'current_password',
            'password'=>'required|string|min:8|max:50|confirmed',
        ],$messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        User::find($user_id)->update([
            'password'=> Hash::make($request->password)
        ]);

        return redirect()->back()->with('success','Đổi mật khẩu thành công');
    }
}