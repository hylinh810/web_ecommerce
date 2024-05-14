@extends('front.layout.master')
@section('title', 'Chi tiết đơn hàng')
@section('body')
    <div class="organic_food_wrapper blog_details">
        <!--Header start-->
        <header class="header sticky-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="header_wrapper_inner">

                            <div class="logo col-xs-12">
                                <a href="/">
                                    <img src="assets/img/logo/logo1.png" alt="">
                                </a>
                            </div>


                            <div class="main_menu_inner">

                                <div class="menu">
                                    <nav>
                                        <ul>
                                            <li>
                                                <a href="">Trang chủ</a>
                                            </li>
                                            {{-- <li><a href="gioi-thieu">Giới thiệu </a></li> --}}
                                            <li><a href="shop">Sản phẩm</a></li>
                                            <li><a href="blog">Blog </a></li>

                                            <li><a href="lien-he">Liên hệ</a></li>
                                        </ul>
                                    </nav>
                                </div>

                                <div class="mobile-menu d-lg-none">
                                    <nav>
                                        <ul>
                                            <li>
                                                <a href="">Trang chủ</a>
                                            </li>
                                            {{-- <li><a href="gioi-thieu">Giới thiệu </a></li> --}}
                                            <li><a href="shop">Sản phẩm</a></li>
                                            <li><a href="blog">Blog </a></li>

                                            <li><a href="lien-he">Liên hệ</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <div class="header_right_info d-flex">
                                <div class="search_box">
                                    <div class="search_inner">
                                        <form action="shop">
                                            <input name="search" type="text" placeholder="Tìm kiếm">
                                            <button type="submit"><i class="ion-ios-search"></i></button>
                                        </form>
                                    </div>
                                </div>
                                <div class="mini__cart">
                                    <div class="mini_cart_inner">
                                        <div class="cart_icon">
                                            <a href="gio-hang">
                                                <span class="cart_icon_inner">
                                                    <i class="ion-android-cart"></i>
                                                    <span
                                                        class="cart_count">{{ Session::get('cart') != null ? count(Session::get('cart')) : 0 }}</span>
                                                </span>
                                            </a>
                                        </div>

                                    </div>
                                </div>
                                <div class="header_account">
                                    <div class="account_inner">
                                        <a style="cursor: pointer"><i class="ion-person"></i></a>
                                    </div>
                                    <div class="content-setting-dropdown">
                                        <div class="language-selector-wrapper">
                                            <div class="user_info_top">
                                                @if (Auth::check())
                                                    <ul>
                                                        <li style="border-bottom: 1px solid gray">{{ Auth::user()->name }}
                                                        </li>
                                                        <li class="mt-2"><a href="thong-tin-ca-nhan">Thông tin cá nhân</a>
                                                        </li>
                                                        <li><a href="log-out"
                                                                onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();">Đăng
                                                                xuất</a></li>
                                                        <form id="logout-form" action="log-out" method="POST"
                                                            class="d-none">
                                                            @csrf
                                                        </form>
                                                    </ul>
                                                @else
                                                    <ul>
                                                        <li><a href="dang-nhap">Đăng nhập</a></li>
                                                        <li><a href="dang-ky">Đăng ký</a></li>
                                                        <li><a href="buyer/register-shop">Đăng ký bán hàng</a></li>
                                                        <li><a href="buyer/login-shop">Đăng nhập bán hàng</a></li>
                                                    </ul>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!--Header end-->
    </div>
    <!--organicfood wrapper end-->

    <!--breadcrumb area start-->
    <div class="breadcrumb_container ">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <nav>
                        <ul>
                            <li>
                                <a href="">Trang chủ ></a>
                            </li>
                            <li>
                                <a href="thong-tin-ca-nhan">Thông tin cá nhân ></a>
                            </li>
                            <li>
                                <a href="don-hang">Đơn hàng ></a>
                            </li>
                            <li>Chi tiết đơn hàng</li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumb area end-->
    <!--Checkout page section-->
    <div class="Checkout_page_section">
        <div class="container">
            <div class="checkout-form">
                <div class="row">
                    @if ($order)
                        @if ($checkUser)
                            <div class="col-lg-6 col-md-6">
                                <h3>Thông tin nhận hàng</h3>
                                <div class="row">
                                    <div class="col-12 mb-30">
                                        <label for="b_f_name">Họ tên <span>*</span></label>
                                        <input name="name" id="b_f_name" type="text" disabled
                                            value="{{ Auth::user()->name }}">
                                    </div>
                                    <div class="col-12 mb-30">
                                        <label for="city">Tỉnh / Thành phố <span>*</span></label>
                                        <select name="city" id="city" class="choose-city">
                                            <option value="{{ $order->getCity->name }}">{{ $order->getCity->name }}</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-6 mb-30">
                                        <label for="district">Quận / Huyện <span>*</span></label>
                                        <select name="district" id="district" class="choose-district">
                                            <option value="{{ $order->getDistrict->name }}">{{ $order->getDistrict->name }}
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col-lg-6 mb-30">
                                        <label for="ward">Phường / Xã<span>*</span></label>
                                        <select name="ward" id="ward" class="choose-ward">
                                            <option value="{{ $order->getWard->name }}">{{ $order->getWard->name }}</option>
                                        </select>
                                    </div>
                                    <div class="col-12 mb-30">
                                        <label>Địa chỉ cụ thể<span>*</span></label>
                                        <input disabled name="address" id="address" type="text"
                                            value="{{ $order->address }}">
                                    </div>
                                    <div class="col-lg-6 mb-30">
                                        <label for="b_email">Địa chỉ email<span>*</span></label>
                                        <input name="email" id="b_email" type="text" disabled
                                            value="{{ Auth::user()->email }}">
                                    </div>
                                    <div class="col-lg-6 mb-30">
                                        <label>Số điện thoại<span>*</span></label>
                                        <input name="phone" type="text" disabled value="{{ Auth::user()->phone }}">
                                    </div>
                                    <div class="col-12">
                                        <div class="order-notes">
                                            <label for="note">Ghi chú</label>
                                            <textarea disabled name="note" id="note" placeholder="Ghi chú...">{{ $order->note }}</textarea>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="coupon-form-two mb-30">
                                    <h3>Trạng thái đơn hàng</h3>
                                    <div>
                                        <p>Mã đơn hàng: <b>{{ $order->order_code }}</b></p>
                                        <p>Ngày đặt hàng: <b>{{ date('d/m/Y', strtotime($order->order_date)) }}</b></p>
                                        @if ($order->paid == 1)
                                            <p>Thời gian thanh toán:
                                                <b>{{ date('H:m:i, d/m/Y', strtotime($order->pay_date)) }}</b>
                                            </p>
                                        @endif
                                        <p>Trạng thái: <b>{{ $order->status }}</b></p>
                                        @if ($order->shipper_id != null)
                                            <p>Thời gian giao hàng:
                                                <b>{{ date('d/m/Y', strtotime($order->ship_date)) }}</b>
                                            </p>
                                            <p>Người giao hàng: <b>{{ $order->shipper->name }}</b></p>
                                            <p>Số điện thoại: <b>{{ $order->shipper->phone }}</b></p>
                                        @endif
                                    </div>
                                </div>
                                <div class="order-wrapper">
                                    <h3>Đơn hàng</h3>
                                    <div class="order-table table-responsive mb-30">
                                        <table>
                                            <thead>
                                                <tr>
                                                    <th class="product-name">Sản phẩm</th>
                                                    <th class="product-total">Thành tiền</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($order->orderDetails as $orderDetail)
                                                    <tr>
                                                        <td class="product-name">
                                                            <h6 class="product-name">
                                                                @php
                                                                    $shop = \App\Models\User::find($orderDetail->product->shop_id);
                                                                    echo $shop ? $shop->name : 'Unknown Shop';
                                                                @endphp
                                                            </h6>
                                                            <br>
                                                            {{ $orderDetail->product->product_name }}<strong> ×
                                                                {{ $orderDetail->quantity }}</strong>
                                                        </td>
                                                        <td class="amount">{{ number_format($orderDetail->total, 0) }}đ
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>Tổng tiền</th>
                                                    <td>{{ number_format($order->total, 0) }}đ</td>
                                                </tr>
                                                @if ($order->discount > 0)
                                                    <tr>
                                                        <th>Khuyến mãi</th>
                                                        <td>{{ number_format($order->discount, 0) }}đ</td>
                                                    </tr>
                                                @endif
                                                <tr>
                                                    <th>Tổng cộng</th>
                                                    <td><strong>{{ number_format($order->total, 0) }}đ</strong></td>
                                                </tr>

                                            </tfoot>
                                        </table>
                                    </div>

                                    <h3>Phương thức thanh toán</h3>
                                    <div class="payment-method">
                                        <div class="panel-default" style="position: relative;height: 53px;">
                                            <input type="radio" {{ $order->payment_id == 1 ? 'checked' : '' }}
                                                name="payment_id" id="payment_id"
                                                style="position: absolute;width: 15px;right: 10px;">
                                            <label style="margin-left: 80px" class="righ_10">Thanh toán COD</label>
                                            <img style="position: absolute;width: 100px;height: 50px;top: 0;"
                                                src="assets/img/ship/ship-cod.jpg" />
                                        </div>
                                        <div class="panel-default mt-20" style="position: relative;height: 53px;">
                                            <input type="radio" {{ $order->payment_id == 2 ? 'checked' : '' }}
                                                name="payment_id" id="payment_id2"
                                                style="position: absolute;width: 15px;right: 10px;">
                                            <label style="margin-left: 80px" class="righ_10">Thanh toán trực tuyến</label>
                                            <img style="position: absolute;top: 0;width: 100px;height: 50px;"
                                                src="assets/img/ship/vnpay.png" />
                                        </div>
                                    </div>

                                </div>
                            </div>
                        @else
                            <div class="col-lg-8 offset-lg-2 col-md-12 col-12 mt-50">
                                <div class="error-wrapper text-center">
                                    <div class="error-text">
                                        <h2>404</h2>
                                        <h5>Xin lỗi, chúng tôi không thể tìm thấy trang này</h5>
                                        <p>Trang bạn tìm kiếm đã bị xoá hoặc thay đổi tạm thời</p>
                                    </div>
                                    <div class="search-error product-search">
                                        <form action="shop">
                                            <input type="text" name="search" class="input-text"
                                                placeholder="Tìm kiếm sản phẩm...">
                                            <button type="submit" class="submit-btn">Tìm kiếm</button>
                                        </form>
                                    </div>
                                    <div class="back_home_page">
                                        <a href="">Trở về trang chủ</a>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @else
                        <div class="col-lg-8 offset-lg-2 col-md-12 col-12 mt-50">
                            <div class="error-wrapper text-center">
                                <div class="error-text">
                                    <h2>404</h2>
                                    <h5>Xin lỗi, chúng tôi không thể tìm thấy trang này</h5>
                                    <p>Trang bạn tìm kiếm đã bị xoá hoặc thay đổi tạm thời</p>
                                </div>
                                <div class="search-error product-search">
                                    <form action="shop">
                                        <input type="text" name="search" class="input-text"
                                            placeholder="Tìm kiếm sản phẩm...">
                                        <button type="submit" class="submit-btn">Tìm kiếm</button>
                                    </form>
                                </div>
                                <div class="back_home_page">
                                    <a href="">Trở về trang chủ</a>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!--Checkout page section end-->
    <!--organicfood wrapper start-->
    <div class="footer_food_wrapper">
        <!-- footer start -->
        <footer class="footer pt-90 checkout">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-md-12 col-xs-12">
                        <!--Single Footer-->
                        <div class="single_footer widget">
                            <div class="single_footer_widget_inner">
                                <div class="footer_logo">
                                    <a href="#"><img src="assets/img/logo/logo1.png" alt=""></a>
                                </div>
                                {{-- <div class="footer_content">
                                    <p>Địa chỉ: Đường Nam Kỳ Khởi Nghĩa, TP Đà Nẵng</p>
                                    <p>Điện thoại: 0123 456 789</p>
                                    <p>Email: thang281201@gmail.com</p>
                                </div> --}}
                                <div class="footer_social">
                                    <h4>Theo dõi ngay:</h4>
                                    <div class="footer_social_icon">
                                        <a href="#"><i class="fa fa-twitter"></i></a>
                                        <a href="#"><i class="fa fa-google-plus"></i></a>
                                        <a href="#"><i class="fa fa-facebook"></i></a>
                                        <a href="#"><i class="fa fa-youtube"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Single Footer-->
                    </div>
                    <div class="col-lg-6 col-md-12 col-xs-12">
                        <div class="footer_menu_list d-flex justify-content-between">
                            <!--Single Footer-->
                            <div class="single_footer widget">
                                <div class="single_footer_widget_inner">
                                    <div class="footer_title">
                                        <h2>Sản phẩm</h2>
                                    </div>
                                    <div class="footer_menu">
                                        <ul>
                                            <li><a href="#"> Rau củ quả</a></li>
                                            <li><a href="#"> Trái cây</a></li>
                                            <li><a href="#"> Hải sản</a></li>
                                            <li><a href="#"> Thịt gà</a></li>
                                            <li><a href="#"> Thịt bò</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!--Single footer end-->
                            <!--Single footer start-->
                            <div class="single_footer widget">
                                <div class="single_footer_widget_inner">
                                    <div class="footer_title">
                                        <h2>Chuyên mục</h2>
                                    </div>
                                    <div class="footer_menu">
                                        <ul>
                                            <li><a href="#"> Cẩm nang sức khoẻ</a></li>
                                            <li><a href="#"> An toàn thực phẩm</a></li>
                                            <li><a href="#"> Kiến thức</a></li>
                                            <li><a href="#"> Món ngon mỗi ngày</a></li>
                                            <li><a href="#"> Góc khuyến nông</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!--Single Footer end-->
                            <!--Single footer start-->
                            <div class="single_footer widget">
                                <div class="single_footer_widget_inner">
                                    <div class="footer_title">
                                        <h2>Chăm sóc khách hàng</h2>
                                    </div>
                                    <div class="footer_menu">
                                        <ul>
                                            <li><a href="#"> Chính sách đổi trả</a></li>
                                            <li><a href="#"> Chính sách giao hàng</a></li>
                                            <li><a href="#"> Chính sách thanh toán</a></li>
                                            <li><a href="#"> Điều khoản sử dụng</a></li>
                                            <li><a href="#"> Quy định đơn đặt hàng</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!--Single Footer end-->
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-12 col-xs-12">
                        <div class="footer_title">
                            <h2> Đăng kí nhận tin khuyến mãi </h2>
                        </div>
                        <div class="footer_news_letter">
                            <p>Get E-mail updates about our latest shop and special offers.</p>
                            <div class="newsletter_form">
                                <form action="#">
                                    <input type="email" required placeholder="Your Email Address">
                                    <input type="submit" value="Subscribe">
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="copyright">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-xs-12">
                            <div class="copyright_text">
                                <p>Copyright 2018 <a href="#">LynShop</a>. All Rights Reserved</p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-xs-12">
                            <div class="footer_mastercard text-right">
                                <a href="#"><img src="assets/img/brand/payment.png" alt=""></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </footer>

        <!-- footer end -->
    </div>
    <script src="assets/js/vendor/jquery-1.12.0.min.js"></script>
    <script>
        $('.choose-city').on('change', function() {
            var city_id = $(this).val();

            $.ajax({
                url: "ajax/load-district",
                type: "GET",
                data: {
                    city_id: city_id
                },
                success: function(data) {
                    $('.choose-district').html(data);
                },
                error: function() {
                    alert("Lỗi");
                },
            });
        });

        $('.choose-district').on('change', function() {
            var district_id = $(this).val();
            $.ajax({
                url: "ajax/load-ward",
                type: "GET",
                data: {
                    district_id: district_id
                },
                success: function(data) {
                    $('.choose-ward').html(data);
                },
                error: function() {
                    alert("Lỗi");
                },
            });
        });
    </script>
@endsection
