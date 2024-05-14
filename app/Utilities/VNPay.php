<?php
namespace App\Utilities;

class VNPay
{
    static $vnp_TmnCode = "DOTVO9CM";
    static $vnp_HashSecret = "OJXIOXZYLYMJDODNIGUUOLEWYKRHQBSU"; //Secret key
    static $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
    static $vnp_Returnurl = "/check-out/vnPayCheck";

    public static function vnpay_create_payment(array $data)
    {
        error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
        date_default_timezone_set('Asia/Ho_Chi_Minh');

        $vnp_TxnRef = $data['vnp_TxnRef']; //Mã giao dịch thanh toán tham chiếu của merchant
        $vnp_OrderInfo = $data['vnp_OrderInfo'];
        $vnp_OrderType = 100000;
        $vnp_Amount = $data['vnp_Amount'] * 100; // Số tiền thanh toán
        $vnp_Locale = 'vn'; //Ngôn ngữ chuyển hướng thanh toán
        // $vnp_BankCode = $_POST['bankCode']; //Mã phương thức thanh toán
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR']; //IP Khách hàng thanh toán

        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => self::$vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => env('APP_URL') . self::$vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }

        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = self::$vnp_Url . "?" . $query;
        if (isset(self::$vnp_HashSecret)) {
            $vnpSecureHash =   hash_hmac('sha512', $hashdata, self::$vnp_HashSecret);//  
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }

        $returnData = array(
            'code'=>'00',
            'message' => 'success',
            'data' => $vnp_Url
        );

        return $returnData['data'];
    }
}
//The test
// Ngân hàng	NCB
// Số thẻ	9704198526191432198
// Tên chủ thẻ	NGUYEN VAN A
// Ngày phát hành	07/15
// Mật khẩu OTP	123456