@extends('front.layout.master')
@section('title', 'Liên hệ')
@section('style')
    <link rel="stylesheet" href="assets/css/icofont.css" />
@endsection
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

                                            <li class="active"><a href="lien-he">Liên hệ</a></li>
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

                                            <li class="active"><a href="lien-he">Liên hệ</a></li>
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
    <div class="breadcrumb_container">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <nav>
                        <ul>
                            <li>
                                <a href="/">Trang chủ ></a>
                            </li>
                            <li>Liên hệ</li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumb area end-->

    <!--contact area css satrt-->
    <div class="contact_area ptb-30">
        <div class="container">

            <div class="row">
                <div class="col-lg-8 col-md-7">
                    <div class="contact-message pb-40">
                        @if (Session::has('success'))
                            <div class="alert alert-success">
                                {{ Session::get('success') }}
                            </div>
                        @endif
                        <div class="contact_title">
                            <h4>Thông tin liên hệ</h4>
                        </div>
                        <form method="post" action="">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="contact_n">Tên<span>*</span></label>
                                    <input name="name" id="contact_n" type="text" required>
                                </div>
                                <div class="col-lg-6">
                                    <label for="contact_n2">Email (nếu có)</label>
                                    <input name="email" id="contact_n2" type="email">
                                </div>
                                <div class="col-12">
                                    <label for="contact_n4">Tiêu đề</label>
                                    <input name="subject" id="contact_n4" type="text" required>
                                </div>
                                <div class="col-12">
                                    <div class="contact-textarea">
                                        <label>Nội dung<span>*</span></label>
                                        <textarea name="message" class="form-control2" required></textarea>
                                    </div>
                                    <button type="submit"> Gửi </button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
                {{-- <div class="col-lg-4 col-md-5">
                    <div class="contact_info_wrapper">
                        <div class="contact_title">
                            <h4>Thông tin cửa hàng</h4>
                        </div>
                        <div class="contact_info mb-15">
                            <div class="contact_info_icone">
                                <a href="#"><i class="icofont icofont-location-pin"></i></a>
                            </div>
                            <div class="contact_info_text">
                                <p><span>Địa chỉ:</span> Đường Nam Kỳ Khởi Nghĩa, Tp Đà Nẵng</p>
                            </div>
                        </div>
                        <div class="contact_info mb-15">
                            <div class="contact_info_icone">
                                <a href="#"><i class="icofont icofont-email"></i></a>
                            </div>
                            <div class="contact_info_text">
                                <p><span>Email: </span> thang281201@gmail.com </p>
                            </div>
                        </div>
                        <div class="contact_info mb-15">
                            <div class="contact_info_icone">
                                <a href="#"><i class="icofont icofont-phone"></i></a>
                            </div>
                            <div class="contact_info_text">
                                <p><span>Điện thoại:</span> 012345789 </p>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
            {{-- <div class="row">
                <div class="col-lg-12 col-md-7">
                    <div class="contact_map_wrapper">
                        <div class="contact_map mb-40" style="overflow: hidden">
                            <!-- Contact Map Start -->
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3835.733297551585!2d108.2497800742611!3d15.975298241947396!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3142108997dc971f%3A0x1295cb3d313469c9!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBDw7RuZyBuZ2jhu4cgVGjDtG5nIHRpbiB2w6AgVHJ1eeG7gW4gdGjDtG5nIFZp4buHdCAtIEjDoG4!5e0!3m2!1svi!2s!4v1693730225345!5m2!1svi!2s"
                                width="1170" height="600" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                            <!-- Contact Map End -->
                        </div>

                    </div>
                </div>

            </div> --}}
        </div>
    </div>

    <!--organicfood wrapper start-->
    <div class="footer_food_wrapper">
        <!-- footer start -->
        <footer class="footer pt-90 contact">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-md-12 col-xs-12">
                        <!--Single Footer-->
                        <div class="single_footer widget">
                            <div class="single_footer_widget_inner">
                                <div class="footer_logo">
                                    <a href=""><img src="assets/img/logo/logo1.png" alt=""></a>
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
                            <h2>Đăng kí nhận tin khuyến mãi</h2>
                        </div>
                        <div class="footer_news_letter">
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
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBCdj974EnipJ4aVWG6_4X6r5v1KovsrzI"></script>
    <script src="assets/js/vendor/jquery-1.12.0.min.js"></script>
    <script src="assets/js/map.js"></script>
@endsection
