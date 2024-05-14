@extends('front.layout.master')
@section('title', 'Đăng ký')
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
                                        <!--Mini Cart Box-->
                                        {{-- <div class="mini_cart_box cart_box_one">
                                       <div class="mini_cart_item">
                                           <div class="mini_cart_img">
                                               <a href="#">
                                                   <img src="assets/img/cart/1.jpg" alt="">
                                                   <span class="cart_count">1</span>
                                               </a>
                                           </div>
                                           <div class="cart_info">
                                               <h5><a href="product-details.html">Mushroom Burger</a></h5>
                                               <span class="cart_price">$75.99</span>
                                           </div>
                                           <div class="cart_remove">
                                               <a href="#"><i class="zmdi zmdi-delete"></i></a>
                                           </div>
                                       </div>
                                       <div class="mini_cart_item">
                                           <div class="mini_cart_img">
                                               <a href="#">
                                                   <img src="assets/img/cart/2.jpg" alt="">
                                                   <span class="cart_count">1</span>
                                               </a>
                                           </div>
                                           <div class="cart_info">
                                               <h5><a href="#">Country Burger</a></h5>
                                               <span class="cart_price">$48.99</span>
                                           </div>
                                           <div class="cart_remove">
                                               <a href="#"><i class="zmdi zmdi-delete"></i></a>
                                           </div>
                                       </div>
                                       
                                       <div class="price_content">
                                           <div class="cart_subtotals">
                                               <div class="price_inline">
                                                   <span class="label">Subtotal </span>
                                                   <span class="value">$143.49 </span>
                                               </div>
                                               <div class="price_inline">
                                                   <span class="label">Shipping </span>
                                                   <span class="value">$7.00</span>
                                               </div>
                                               <div class="price_inline">
                                                   <span class="label">Taxes </span>
                                                   <span class="value">$0.00</span>
                                               </div>
                                           </div>
                                           <div class="cart-total-price">
                                               <span class="label">Total </span>
                                               <span class="value">$85.99</span>
                                           </div>
                                       </div>
                                       <div class="min_cart_checkout">
                                           <a href="checkout.html">Checkout</a>
                                       </div>
                                   </div> --}}
                                        <!--Mini Cart Box End -->
                                    </div>
                                </div>

                                <div class="header_account">
                                    <div class="account_inner">
                                        <a style="cursor: pointer"><i class="ion-person"></i></a>
                                    </div>
                                    <div class="content-setting-dropdown">
                                        <div class="language-selector-wrapper">
                                            <div class="user_info_top">
                                                <ul>
                                                    <li><a href="dang-nhap">Đăng nhập</a></li>
                                                    <li><a href="dang-ky">Đăng ký</a></li>
                                                    <li><a href="buyer/register-shop">Đăng ký bán hàng</a></li>
                                                    <li><a href="buyer/login-shop">Đăng nhập bán hàng</a></li>
                                                </ul>
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
                                <a href="/">Trang chủ ></a>
                            </li>
                            <li>Đăng ký</li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumb area end-->

    <!--login section start-->
    <div class="page_login_section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="register_page_form">
                        <form action="" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="input_text" style="margin-bottom: 15px;">
                                        <label for="name">Họ và tên <span>*</span></label>
                                        <input id="name" class="@error('name') invalid @enderror" name="name"
                                            type="text" value="{{ old('name') }}">
                                        @if ($errors->has('name'))
                                            <span class="text-danger mb-20">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                </div>

                                <div class="col-lg-6 col-sm-6 col-md-6">
                                    <div class="input_text" style="margin-bottom: 15px;">
                                        <label for="email">Địa chỉ Email <span>*</span></label>
                                        <input id="email" class="@error('email') invalid @enderror" name="email"
                                            type="email" value="{{ old('email') }}">
                                        @if ($errors->has('email'))
                                            <span class="text-danger mb-20">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                </div>
                                <div class="col-lg-6 col-sm-6 col-md-6">
                                    <div class="input_text" style="margin-bottom: 15px;">
                                        <label for="phone">Số điện thoại <span>*</span></label>
                                        <input id="phone" class="@error('phone') invalid @enderror" name="phone"
                                            type="text" value="{{ old('phone') }}">
                                        @if ($errors->has('phone'))
                                            <span class="text-danger mb-20">
                                                <strong>{{ $errors->first('phone') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                </div>

                                <div class="col-12">
                                    <div class="input_text" style="margin-bottom: 15px;">
                                        <label for="password">Mật khẩu<span>*</span></label>
                                        <input id="password" class="@error('password') invalid @enderror" name="password"
                                            type="password">
                                        @if ($errors->has('password'))
                                            <span class="text-danger mb-20">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                </div>
                                <div class="col-12">
                                    <div class="input_text" style="margin-bottom: 15px;">
                                        <label for="password2">Xác nhận mật khẩu<span>*</span></label>
                                        <input id="password2" class="@error('password') invalid @enderror"
                                            type="password" name="password_confirmation">
                                        @if ($errors->has('password_confirmation'))
                                            <span class="text-danger mb-20">
                                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                </div>
                                <div class="col-12">
                                    <div class="login_submit">
                                        <input value="Đăng ký" type="submit">
                                        <span class="ml-4">Bạn đã có tài khoản? <a href="dang-nhap">Đăng nhập</a></span>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--login section end-->

    <!--organicfood wrapper start-->
    <div class="footer_food_wrapper footer_register">
        <!-- footer start -->
        <footer class="footer pt-90 my-account">
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
                                    <p>Address: 123 Main Street, Anytown, CA 12345 - USA.</p>
                                    <p>Phone: +(000) 800 456 789</p>
                                    <p>Email: Contact@posthemes.com</p>
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
                            <h2>Đăng kí nhận tin khuyến mãi</h2>
                        </div>
                        <div class="footer_news_letter">
                            <div class="newsletter_form">
                                <form action="#">
                                    <input type="email" required placeholder="Email Address" />
                                    <input type="submit" value="Đăng kí" />
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
                                <p>
                                    Copyright 2018 <a href="#">LynShop</a>. All Rights
                                    Reserved
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-xs-12">
                            <div class="footer_mastercard text-right">
                                <a href="#"><img src="assets/img/brand/payment.png" alt="" /></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

        <!-- footer end -->
    </div>
    <script src="assets/js/vendor/jquery-1.12.0.min.js"></script>
@endsection
