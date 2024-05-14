@extends('front.layout.master')
@section('title', 'Giới thiệu')
@section('body')
    <div class="organic_food_wrapper">
        <!--Header start-->
        <header class="header sticky-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="header_wrapper_inner">

                            <div class="logo col-xs-12">
                                <a href="">
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
                                            {{-- <li class="active"><a href="gioi-thieu">Giới thiệu </a></li> --}}
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
                                            {{-- <li class="active"><a href="gioi-thieu">Giới thiệu </a></li> --}}
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

    <div class="breadcrumb_container">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <nav>
                        <ul>
                            <li>
                                <a href="/">Trang chủ ></a>
                            </li>
                            {{-- <li>Giới thiệu</li> --}}
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumb area end-->
    <!--about section area start-->
    <div class="about_section">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1 col-md-12 text-center">
                    <div class="about_section_one">
                        <h2>Chào mừng đến với LynShop</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore gna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
                            nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                            velit esse cillum dolore eu fugiat.</p>
                    </div>
                    <div class="about__store__btn">
                        <a href="lien-he">Liên hệ chúng tôi</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--about section area end-->
    <!-- about area start-->
    <div class="about_chooseUs_area">
        <div class="container-fluid">
            <div class="row no-gutters">
                <div class="col-xl-6 col-lg-12 col-md-12">
                    <div class="video__wrape__area" style="background-image:url(assets/img/banner/about1.jpg)">
                        <div class="video__inner">
                            <a class="video__trigger" href="https://www.youtube.com/watch?v=cDDWvj_q-o8"><i
                                    class="zmdi zmdi-play"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-12 col-md-12">
                    <div class="about_choose_content">
                        <h3>Tại sao chọn chúng tôi?</h3>
                        <div class="choose_content_inner">
                            <div class="single_choose_us">
                                <div class="choose_us mb-50">
                                    <div class="choose_icone">
                                        <i class="zmdi zmdi-favorite-outline"></i>
                                    </div>
                                    <div class="choose_details">
                                        <h4>Khuyến mãi</h4>
                                        <p>Giảm 10% cho đơn hàng trên 1 triệu </p>
                                    </div>
                                </div>
                                <div class="choose_us">
                                    <div class="choose_icone">
                                        <i class="zmdi zmdi-truck"></i>
                                    </div>
                                    <div class="choose_details">
                                        <h4>Giao hàng</h4>
                                        <p>Giao hàng miễn phí cho đơn hàng trên 500k </p>
                                    </div>
                                </div>
                            </div>
                            <div class="single_choose_us">
                                <div class="choose_us  mb-50">
                                    <div class="choose_icone">
                                        <i class="zmdi zmdi-refresh-alt"></i>
                                    </div>
                                    <div class="choose_details">
                                        <h4>Hoàn tiền</h4>
                                        <p>Hoàn tiền nếu sản phẩm lỗi</p>
                                    </div>
                                </div>
                                <div class="choose_us">
                                    <div class="choose_icone"><i class="zmdi zmdi-time"></i> </div>
                                    <div class="choose_details">
                                        <h4>Hỗ trợ 24/7</h4>
                                        <p>Nhân viên hỗ trợ nhiệt trình 24/7 </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <!-- about area end -->
    <!--about team area start-->
    <div class="about_team_area ptb-90">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="about_section_title">
                        <h2>Nhân viên chúng tôi</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit sed do eiusmod tempor incididunt ut
                            labo.</p>
                    </div>
                </div>
            </div>
            <div class="row no-gutters">
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="single_team">
                        <div class="team__imge">
                            <a href="#"><img src="assets/img/banner/team1.jpg" alt=""></a>
                        </div>
                        <div class="team_hover_inpo">
                            <div class="team_hover_action">
                                <h2><a href="#">Phương Lương</a></h2>
                                <ul>
                                    <li><a><i class="zmdi zmdi-twitter"></i></a></li>
                                    <li><a><i class="zmdi zmdi-instagram"></i></a></li>
                                    <li><a><i class="zmdi zmdi-facebook"></i></a></li>
                                    <li><a><i class="zmdi zmdi-google-plus"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="single_team">
                        <div class="team__imge">
                            <a href="#"><img src="assets/img/banner/team2.jpg" alt=""></a>
                        </div>
                        <div class="team_hover_inpo">
                            <div class="team_hover_action">
                                <h2><a href="#">Văn Thắng</a></h2>
                                <ul>
                                    <li><a href="#"><i class="zmdi zmdi-twitter"></i></a></li>
                                    <li><a href="#"><i class="zmdi zmdi-instagram"></i></a></li>
                                    <li><a href="#"><i class="zmdi zmdi-facebook"></i></a></li>
                                    <li><a href="#"><i class="zmdi zmdi-google-plus"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="single_team team__three">
                        <div class="team__imge">
                            <a href="#"><img src="assets/img/banner/team4.jpg" alt=""></a>
                        </div>
                        <div class="team_hover_inpo">
                            <div class="team_hover_action">
                                <h2><a href="#">Yến Linh</a></h2>
                                <ul>
                                    <li><a href="#"><i class="zmdi zmdi-twitter"></i></a></li>
                                    <li><a href="#"><i class="zmdi zmdi-instagram"></i></a></li>
                                    <li><a href="#"><i class="zmdi zmdi-facebook"></i></a></li>
                                    <li><a href="#"><i class="zmdi zmdi-google-plus"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--about team area end-->
    <!--testimonial area start-->
    <div class="about_testimonial_area mb-65" style="background-image:url(assets/img/banner/testimonial4.jpg)">
        <div class="about_testimonial_inner">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 offset-xl-2 col-lg-12 col-md-12">
                        <div class="testimonial___wrapper owl-carousel">
                            <div class="single___testimonial text-center">
                                <div class="testimonial__image ">
                                    <img src="assets/img/banner/testi1.png" alt="">
                                </div>
                                <div class="testimonial__details">
                                    <p>Sản phẩm tốt chất lượng cao</p>
                                </div>
                                <div class="testimonial__info">
                                    <a href="#">Gia Huy</a>
                                    <span>-</span>
                                    <span>Khách hàng</span>
                                </div>
                            </div>
                            <div class="single___testimonial text-center">
                                <div class="testimonial__image">
                                    <img src="assets/img/banner/testi2.png" alt="">
                                </div>
                                <div class="testimonial__details">
                                    <p>Giao hàng nhanh chóng, miễn phí ship</p>
                                </div>
                                <div class="testimonial__info">
                                    <a href="#">Văn Thắng</a>
                                    <span>-</span>
                                    <span>Khách hàng</span>
                                </div>
                            </div>
                            <div class="single___testimonial text-center">
                                <div class="testimonial__image">
                                    <img src="assets/img/banner/testi3.png" alt="">
                                </div>
                                <div class="testimonial__details">
                                    <p>Khuyến mãi ưu đãi, chăm sóc khách hàng tận tình</p>
                                </div>
                                <div class="testimonial__info">
                                    <a href="#">Phương Lương</a>
                                    <span>-</span>
                                    <span>Khách hàng</span>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--testimonial area end-->

    <div class="organic_food_wrapper">
        <!-- footer start -->
        <footer class="footer footer_about pt-90">
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
    </div>
    <script src="assets/js/vendor/jquery-1.12.0.min.js"></script>
@endsection
