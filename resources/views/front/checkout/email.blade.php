<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <style>
      .order {
        width: 80%;
        height: 100%;
        margin: 0 auto;
        background-color: white;
      }
      .header {
        color: #78a206;
        font-size: 35px;
        padding: 15px 30px;
        font-weight: bold
      }
      .order-nofy {
        background-color: rgb(9, 96, 167);
        color: white;
        padding: 30px;
      }
      .body {
        width: 80%;
        margin: auto;
        background-color: white;
      }
    </style>
  </head>
  <body>
    <div style="background-color: rgb(164, 222, 233);overflow-y: scroll">
        <div class="order" style="margin-top: 10px">
            <div class="header">Lynshop</div>
            <div class="order-nofy">
                <h1 style="color: white">Thông tin đơn hàng</h1>
                <p style="color: white;font-size: 18px;"><b>Mã đơn hàng</b>: {{ $order->order_code }}</p>
                <p style="color: white;font-size: 18px;"><b>Ngày đặt hàng</b>: {{ date('d/m/Y', strtotime($order->order_date)) }}</p>
                <p style="color: white;font-size: 18px;"><b>Địa chỉ</b>: {{ $order->address }}, {{ $order->getCity->name}}, {{ $order->getDistrict->name}}, {{$order->getWard->name }}</p>
                <p style="color: white;font-size: 18px;"><b>Ngày thanh toán</b>: {{ date('d/m/Y', strtotime($order->pay_date)) }}</p>
            </div>
        </div>
        <div class="body">
            <h1 style="padding-left: 30px;padding: 20px ;background-color: rgb(0, 173, 150);color: white">Chi tiết đơn hàng</h1>
            <div style="width: 100%;">
                <table style="width: 100%">
                    <thead>
                        <tr>
                            <th style="text-align: left;padding-left: 30px;border-bottom: 1px solid gray;padding-bottom: 10px;font-size: 23px;font-weight: bold">Sản phẩm</th>
                            <th style="text-align: right;padding-right: 30px;border-bottom: 1px solid gray;padding-bottom: 10px;font-size: 23px;font-weight: bold">Thành tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($order->orderDetails as $orderDetail)
                        <tr>
                            <td style="text-align: left;padding-left: 30px;border-bottom: 1px solid gray;padding-bottom: 20px;padding-top: 20px;font-size: 20px;">{{ $orderDetail->product->product_name }} x {{ $orderDetail->quantity }}</td>
                            <td style="text-align: right;padding-right: 30px;border-bottom: 1px solid gray;padding-bottom: 20px;padding-top: 20px;font-size: 20px;">{{ number_format($orderDetail->total,0) }}đ</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="body" style="margin-bottom: 50px">
            <h1 style="padding-left: 30px;padding: 20px ;background-color: rgb(0, 173, 150);color: white">Thông tin thanh toán</h1>
            <div style="width: 100%;">
                <table style="width: 100%">
                    <tbody>
                        <tr>
                            <td style="text-align: left;padding-left: 30px;border-bottom: 1px solid gray;padding-bottom: 20px;padding-top: 10px;font-size: 20px;">Tổng tiền</td>
                            <td style="text-align: right;padding-right: 30px;border-bottom: 1px solid gray;padding-bottom: 20px;padding-top: 10px;font-size: 20px;">{{ number_format($order->subtotal,0) }}đ</td>
                        </tr>
                        @if($order->discount != 0)
                        <tr>
                            <td style="text-align: left;padding-left: 30px;border-bottom: 1px solid gray;padding-bottom: 20px;padding-top: 20px;font-size: 20px;">Khuyến mãi</td>
                            <td style="text-align: right;padding-right: 30px;border-bottom: 1px solid gray;padding-bottom: 20px;padding-top: 20px;font-size: 20px;">{{ number_format($order->discount,0) }}đ</td>
                        </tr>
                        @endif
                        <tr>
                            <td style="text-align: left;padding-left: 30px;border-bottom: 1px solid gray;padding-bottom: 20px;padding-top: 10px;font-size: 20px;">Tổng cộng</td>
                            <td style="text-align: right;padding-right: 30px;border-bottom: 1px solid gray;padding-bottom: 20px;padding-top: 10px;font-size: 20px;">{{ number_format($order->total,0) }}đ</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    <div>
  </body>
</html>
