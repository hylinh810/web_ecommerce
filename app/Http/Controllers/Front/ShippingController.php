<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ShippingController extends Controller
{
    // AIzaSyAOMou-Xl8HENdKmRq7mbmYULFizUYIfHY

    public function calculateShippingCost()
    {
        $customerAddress = '2 Quang Trung, Thach Thang, Hai Chau, Da Nang';
        $storeAddress = '10 Luu Quang Vu, Hoa Quy, Ngu Hanh Son, Da Nang';
        $apiKey = 'AIzaSyDxujAGCCMpP4dAUmrJhCgZISKGsfND3Og';
        // dd($apiKey);

        $response = Http::get('https://maps.googleapis.com/maps/api/distancematrix/json', [
            'origins' => $customerAddress,
            'destinations' => $storeAddress,
            'key' => $apiKey,
        ]);
        // dd($response);

        $data = $response->json();
        dd($data);

        if ($data['status'] === 'OK') {
            $distance = $data['rows'][0]['elements'][0]['distance']['value']; // Khoảng cách trong mét
            $distanceInKm = $distance / 1000; // Chuyển đổi sang kilômét

            // Áp dụng quy tắc tính chi phí vận chuyển dựa trên khoảng cách
            $shippingCost = $this->calculateShippingCostBasedOnDistance($distanceInKm);

            return $shippingCost;
        
            dd($distance);
        }
        return null; // Xử lý lỗi hoặc không thể tính khoảng cách
    }

    public function calculateShippingCostBasedOnDistance($distanceInKm)
    {
        // Áp dụng quy tắc tính chi phí vận chuyển dựa trên khoảng cách
        // Việc này có thể là một bảng giá hoặc quy tắc cụ thể của cửa hàng
        // Ví dụ đơn giản: $1 cho mỗi kilômét
        $costPerKm = 1;
        $shippingCost = $distanceInKm * $costPerKm;

        return $shippingCost;
    }
}