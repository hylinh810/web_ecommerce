@extends('front.layout.master')
@section('title', 'Thanh toán')
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
                                                <a href="/">Trang chủ</a>
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
                                                <a href="/">Trang chủ</a>
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
                                <a href="gio-hang">Giỏ hàng ></a>
                            </li>
                            <li>Thanh toán</li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumb area end-->
    <!--Checkout page section-->
    <form action="{{ url('check-out/add-order') }}" method="POST" autocomplete="on">
        @csrf
        <div class="Checkout_page_section">
            <div class="container">
                <div class="checkout-form">
                    <div class="row">
                        @if ($carts)
                            <div class="col-lg-6 col-md-6">

                                <h3>Thông tin nhận hàng</h3>
                                <div class="row">
                                    <div class="col-12 mb-30">
                                        <label for="b_f_name">Họ tên <span>*</span></label>
                                        <input required name="name" id="b_f_name" type="text" disabled
                                            value="{{ Auth::user()->name }}">
                                    </div>
                                    <div class="col-12 mb-30">
                                        <label for="city">Tỉnh / Thành phố <span>*</span></label>
                                        <select required name="city" id="city" class="choose-city">
                                            <option disabled>----Chọn tỉnh thành phố----</option>
                                            @foreach ($cities as $city)
                                                <option value="{{ $city->id }}">{{ $city->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-6 mb-30">
                                        <label for="district">Quận / Huyện <span>*</span></label>
                                        <select required name="district" id="district" class="choose-district">
                                            <option disabled>----Chọn quận huyện----</option>
                                            {{-- district --}}
                                        </select>
                                    </div>
                                    <div class="col-lg-6 mb-30">
                                        <label for="ward">Phường / Xã<span>*</span></label>
                                        <select required name="ward" id="ward" class="choose-ward">
                                            <option disabled>----Chọn phường xã----</option>
                                        </select>
                                    </div>
                                    <div class="col-12 mb-30">
                                        <label>Địa chỉ cụ thể<span>*</span></label>
                                        <input name="address" id="address" type="text" required>
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
                                            <textarea name="note" id="note" placeholder="Ghi chú..."></textarea>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-lg-6 col-md-6">
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
                                                @foreach ($carts as $cart)
                                                    <tr>
                                                        <td class="product-name">
                                                            <h6 class="product-name">
                                                                @php
                                                                    $shop = \App\Models\User::find($cart['shop_id']);
                                                                    echo $shop ? $shop->name : 'Unknown Shop';
                                                                @endphp
                                                            </h6>
                                                            {{ $cart['product_name'] }}<strong> ×
                                                                {{ $cart['product_qty'] }}</strong>


                                                        </td>
                                                        <td class="amount">{{ number_format($cart['product_total'], 0) }}đ
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>Tổng tiền</th>
                                                    <td>{{ number_format($total, 0) }}đ</td>
                                                </tr>
                                                @if ($coupon)
                                                    @if ($coupon['coupon_type'] == 1)
                                                        @php
                                                            $discount = ($total * $coupon['coupon_value']) / 100;
                                                            if ($discount > $coupon['max_discount']) {
                                                                $discount = $coupon['max_discount'];
                                                            }
                                                        @endphp
                                                        <tr>
                                                            <th>Khuyến mãi</th>
                                                            <td>-{{ number_format($discount, 0) }}đ</td>
                                                        </tr>
                                                    @else
                                                        <tr>
                                                            <th>Khuyến mãi</th>
                                                            <td>-{{ number_format($coupon['coupon_value'], 0) }}đ</td>
                                                        </tr>
                                                    @endif
                                                @else
                                                    <tr>
                                                        <th>Khuyến mãi</th>
                                                        <td>0đ</td>
                                                    </tr>
                                                @endif
                                                @if ($coupon)
                                                    @if ($coupon['coupon_type'] == 1)
                                                        @php
                                                            $total_remain = $total - $discount;
                                                        @endphp
                                                        <tr>
                                                            <th>Tổng cộng</th>
                                                            <td><strong>{{ number_format($total_remain, 0) }}đ</strong>
                                                            </td>
                                                        </tr>
                                                    @else
                                                        @php
                                                            $total_remain = $total - $coupon['coupon_value'];
                                                        @endphp
                                                        <tr>
                                                            <th>Tổng cộng</th>
                                                            <td><strong>{{ number_format($total_remain, 0) }}đ</strong>
                                                            </td>
                                                        </tr>
                                                    @endif
                                                @else
                                                    <tr>
                                                        <th>Tổng cộng</th>
                                                        <td><strong>{{ number_format($total, 0) }}đ</strong></td>
                                                    </tr>
                                                @endif
                                                @if (Session::has('outofstock'))
                                                    <span class="text-danger mb-20">
                                                        <strong>{{ Session::get('outofstock') }}</strong>
                                                    </span>
                                                @endif
                                            </tfoot>
                                        </table>
                                    </div>
                                    <h3>Chọn phương thức thanh toán</h3>
                                    <div class="payment-method">
                                        <div class="panel-default" style="position: relative;height: 53px;">
                                            <input type="radio" checked value="1" name="payment_id"
                                                id="payment_id" style="position: absolute;width: 15px;right: 10px;">
                                            <label style="margin-left: 80px" class="righ_10" for="payment_id">Thanh toán
                                                COD</label>
                                            <img style="position: absolute;width: 100px;height: 50px;top: 0;"
                                                src="assets/img/ship/ship-cod.jpg" />
                                        </div>
                                        <div class="panel-default mt-20" style="position: relative;height: 53px;">
                                            <input type="radio" value="2" name="payment_id" id="payment_id2"
                                                style="position: absolute;width: 15px;right: 10px;">
                                            <label style="margin-left: 80px" class="righ_10" for="payment_id2">Thanh toán
                                                trực tuyến</label>
                                            <img style="position: absolute;top: 0;width: 100px;height: 50px;"
                                                src="assets/img/ship/vnpay.png" />
                                        </div>
                                        <div class="order-button">
                                            <button type="submit">Đặt hàng</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="col-12" style="text-align: center;">
                                <img src="assets/img/cart/cart-empty.png" />
                                <p style="font-size: 25px">Bạn chưa có sản phẩm nào trong giỏ hàng</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </form>
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
