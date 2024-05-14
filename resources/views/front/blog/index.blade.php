@extends('front.layout.master')
@section('title', 'Blog')
@section('body')
    <!--organicfood wrapper start-->
    <div class="organic_food_wrapper blog_page">
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
                                            <li class="active"><a href="blog">Blog </a></li>

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
                                            <li class="active"><a href="blog">Blog </a></li>

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
                            <li>Blog</li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumb area end-->

    <!--blog area start-->
    <div class="blog_list_area">
        <div class="container">
            <div class="row">
                @foreach ($blogs as $blog)
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="single_blog_list">
                            <div class="blog__thumb">
                                <a href="blog/{{ $blog->alias }}"><img src="front/blog/{{ $blog->thumb }}"
                                        height="300px"></a>
                            </div>
                            <div class="post__content">
                                <h3><a href="blog/{{ $blog->alias }}">{{ $blog->title }}</a></h3>
                                <p>{!! Str::limit($blog->scontent, 120, '...') !!}</p>
                                <ul>
                                    <li><a href="blog/{{ $blog->alias }}">Đọc thêm</a></li>
                                    <li class="post_date">{{ date('d/m/Y', strtotime($blog->create_date)) }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="col-12">
                    {{ $blogs->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
    <!--blog area end-->

    <!--organicfood wrapper start-->
    <div class="footer_food_wrapper blog_food">
        <!-- footer start -->
        <footer class="footer pt-90">
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
    <!--organicfood wrapper end-->
    <script src="assets/js/vendor/jquery-1.12.0.min.js"></script>

@endsection
