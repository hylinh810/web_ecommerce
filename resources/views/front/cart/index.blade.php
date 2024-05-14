    @extends('front.layout.master')
    @section('title', 'Giỏ hàng')
    @section('body')
        <!--organicfood wrapper start-->
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
                                                            <li style="border-bottom: 1px solid gray">
                                                                {{ Auth::user()->name }}</li>
                                                            <li class="mt-2"><a href="thong-tin-ca-nhan">Thông tin cá
                                                                    nhân</a></li>
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
        <div class="breadcrumb_container">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <nav>
                            <ul>
                                <li><a href="">Trang chủ ></a></li>
                                <li>Giỏ hàng</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!--breadcrumb area end-->
        <div class="cart_main_area">
            <div class="container">
                <div class="row">
                    @if (Session::get('cart') != null)
                        <div class="col-12">
                            <form>
                                <div class="table-content table-responsive">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th class="img-thumbnail">Hình ảnh</th>
                                                <th class="product-name">Tên sản phẩm</th>
                                                <th class="product-price">Đơn giá</th>
                                                <th class="product-quantity">Số lượng</th>
                                                <th class="product-subtotal">Thành tiền</th>
                                                <th class="product-remove">Xoá</th>
                                            </tr>
                                        </thead>
                                        @php
                                            $total = 0;
                                        @endphp
                                        @foreach ($carts as $cart)
                                            @php
                                                $total += $cart['product_total'];
                                            @endphp
                                            <tbody data-row-id="{{ $cart['session_id'] }}">
                                                <tr>
                                                    <h4  style="display:none;">{{$cart['shop_id']}}</h4>
                                                    <td class="product-thumbnail"><img
                                                            src="front/img/{{ $cart['product_image'] }}" alt="">
                                                    </td>
                                                    <td class="product-name"><a
                                                            href="shop/san-pham/{{ $cart['product_id'] }}">{{ $cart['product_name'] }}</a>
                                                    </td>
                                                    <td class="product-price">
                                                        <span class="amount">
                                                            {{ number_format($cart['product_price'], 0) }}đ
                                                        </span>
                                                    </td>
                                                    <td class="product-quantity">
                                                        <div class="quickview_plus_minus quick_cart">
                                                            <div class="quickview_plus_minus_inner">
                                                                <div class="cart-plus-minus cart_page">
                                                                    <input type="number" min="1"
                                                                        value="{{ $cart['product_qty'] }}" name="qtybutton"
                                                                        class="cart-plus-minus-box">
                                                                    <input type="hidden" id="stocks"
                                                                        value="{{ $cart['product_stocks'] }}" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="product-subtotal">
                                                        {{ number_format($cart['product_total'], 0) }}đ</td>
                                                    <td class="product-remove"><a style="cursor: pointer"
                                                            onclick="remove('{{ $cart['session_id'] }}')">X</a></td>
                                                </tr>
                                            </tbody>
                                        @endforeach
                                    </table>
                                </div>
                                <div class="row table-responsive_bottom">
                                    <div class="col-lg-7 col-sm-7 col-md-7">
                                        <div class="buttons-carts">
                                            <a onclick="window.location.href = 'gio-hang/destroy'"
                                                style="color: white;cursor: pointer;">Xoá tất cả</a>
                                        </div>
                                        <div class="buttons-carts coupon">
                                            <h3>Mã giảm giá</h3>
                                            <div id="load-coupon">
                                                {{-- coupon --}}
                                            </div>
                                            <input placeholder="Mã giảm giá" type="text" id="coupon"
                                                value="">
                                            <a onclick="checkCoupon()" style="color: white;cursor: pointer;">Sử dụng</a>

                                        </div>
                                        <div id="coupon-error" class="mb-30">
                                            {{-- message --}}
                                        </div>

                                    </div>
                                    <div class="col-lg-5 col-sm-5 col-md-5" id="load-cart-total">
                                        {{-- cart total --}}
                                    </div>
                                </div>
                            </form>
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

        <!--organicfood wrapper start-->
        <div class="footer_food_wrapper">
            <!-- footer start -->
            <footer class="footer pt-80">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-3 col-md-12 col-xs-12">
                            <!--Single Footer-->
                            <div class="single_footer widget">
                                <div class="single_footer_widget_inner">
                                    <div class="footer_logo">
                                        <a href="/"><img src="assets/img/logo/logo1.png" alt=""></a>
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
        <script type="text/javascript">
            $(document).ready(function() {

                $('#load-coupon').load('ajax/load-coupon-used');
                $('#load-cart-total').load('ajax/load-cart-total');
            });

            function checkCoupon() {
                let code = $('#coupon').val();
                if ($.trim(code) == "") {
                    $('#coupon-error').html(`<span class="text-danger">Vui lòng nhập mã giảm giá</span>`);
                    return;
                }
                $.ajax({
                    url: "ajax/coupon",
                    type: "GET",
                    data: {
                        code: code
                    },
                    success: function(data) {
                        $('#load-cart-total').load('ajax/load-cart-total');
                        if (data['notify'] == 'danger') {
                            $('#coupon-error').html(`<span class="text-danger">` + data['message'] + `</span>`);
                        } else {
                            $('#load-coupon').load('ajax/load-coupon-used');
                            $('#coupon-error').html('');
                        }
                    },
                    error: function() {
                        alert("Lỗi");
                    },
                });
            }

            function removeCoupon() {
                $.ajax({
                    url: "ajax/remove-coupon",
                    type: "GET",
                    success: function() {
                        $('#load-cart-total').load('ajax/load-cart-total');
                        $('#load-coupon').load('ajax/load-coupon-used');
                    },
                    error: function() {
                        alert("Lỗi");
                    },
                });
            }
        </script>
    @endsection
