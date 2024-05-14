<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\District;
use App\Models\User;
use App\Models\Ward;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;


class BuyerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cities = City::get();
        return view('buyer.register', compact('cities'));
    }

    public function loadDistrict(Request $request)
    {
        $cityId = $request->city_id;
        $districts = District::where('city_id', $cityId)->get();
        $response = "";
        foreach ($districts as $district) {
            $response .= '<option value="' . $district->id . '">' . $district->name . '</option>';
        }
        return $response;
    }

    public function loadWard(Request $request)
    {
        $district_id = $request->district_id;
        $wards = Ward::where('district_id', $district_id)->get();
        $response = "";
        foreach ($wards as $ward) {
            $response .= '<option value="' . $ward->id . '">' . $ward->name . '</option>';
        }
        return $response;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
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
            'password' => 'required|string|min:8|max:50|confirmed',
            'phone' => 'required|unique:users|starts_with:0|digits:10',
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }


        // Tạo người dùng mới với cấp độ là 2
        $user = new User();
        $user->name = $request->input('name'); // Bạn có thể điều chỉnh tên theo yêu cầu của mình
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password')); // Đảm bảo mã hóa mật khẩu
        $user->phone = $request->input('phone');
        $user->city = $request->input('city');
        $user->district = $request->input('district');
        $user->ward = $request->input('ward');
        $user->address = $request->input('address');
        $user->level = 2; // Cấp độ mặc định cho người mở cửa hàng
        $user->status = 'Chờ xác nhận';
        $user->save();

        // Gửi thông báo cho admin hoặc thực hiện các bước xác nhận khác

        return redirect()->back()->with('success', 'Yêu cầu của bạn đã được gửi. Vui lòng đợi xác nhận từ admin.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}