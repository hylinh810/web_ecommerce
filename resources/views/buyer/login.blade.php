    @extends('front.layout.master')
    @section('title','Đăng nhập')
    @section('body')
    <div class="organic_food_wrapper blog_details">
        <!--Header start-->
        <header class="header">
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
                                                <a href="/"
                                                >Trang chủ</a>
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
                                                <a href="/"
                                                >Trang chủ</a>
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
                                                    <span class="cart_count">{{ Session::get('cart') != null ? count(Session::get('cart')) : 0 }}</span>
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
    <div class="breadcrumb_container">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">     
                    <nav>
                <ul>
                    <li><a href="/">Trang chủ</a> ></li>
                    <li>Đăng nhập</li>
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
                <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-sm-10 offset-sm-1">
                    <div class="login_page_form">
                        @if(Session::has('error'))
                            <div class="alert alert-danger">
                                {{Session::get('error')}}
                            </div>
                        @endif
                        @if(Session::has('success'))
                            <div class="alert alert-success">
                                {{Session::get('success')}}
                            </div>
                        @endif
                        <form action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="input_text">
                                        <label for="email">Địa chỉ Email</label>
                                        <input id="email" type="email" name="email" value="{{ old('email') }}">  
                                        @if($errors->has('email'))
                                            <span class="text-danger mb-20">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif 
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="input_text">
                                        <label for="password">Mật khẩu</span></label>
                                        <input id="password" type="password" name="password">
                                        @if($errors->has('password'))
                                            <span class="text-danger mb-20">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif 
                                    </div>   
                                </div>
                                <div class="col-12">
                                    <div class="login_submit mb-10" >
                                        <input class="inline" value="Đăng nhập" name="login" type="submit">
                                        <label class="inline" for="rememberme">
                                            <input id="rememberme" type="checkbox" name="remember">
                                            Nhớ mật khẩu
                                        </label>   
                                    </div> 
                                </div>      
                            </div>
                        </form>    
                        <span>Bạn chưa có tài khoản? <a href="dang-ky">Đăng ký</a></span>
                    </div>    
                </div>    
            </div>    
        </div>  
    </div>

    <!--login section end-->

    <!--organicfood wrapper start--> 
    <div class="footer_food_wrapper">         
        <!-- footer start -->
        <footer class="footer pt-90 my-account">
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
                                    <p>Address: 123 Main Street, Anytown, CA 12345 - USA.</p>
                                    <p>Phone: +(000) 800 456 789</p>
                                    <p>Email: Contact@posthemes.com</p>
                                </div> --}}
                                <div class="footer_social">
                                    <h4>Get in Touch:</h4>
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
                                        <h2>Products</h2>
                                    </div>
                                    <div class="footer_menu">
                                        <ul>
                                            <li><a href="#">Prices drop</a></li>
                                            <li><a href="#"> New products</a></li>
                                            <li><a href="#"> Best sales</a></li>
                                            <li><a href="#"> Contact us</a></li>
                                            <li><a href="#"> My account</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!--Single footer end-->   
                            <!--Single footer start-->   
                            <div class="single_footer widget">
                                <div class="single_footer_widget_inner">   
                                    <div class="footer_title">
                                        <h2>Login</h2>
                                    </div>
                                    <div class="footer_menu">
                                        <ul>
                                            <li><a href="#">Sitemap</a></li>
                                            <li><a href="#"> Stores</a></li>
                                            <li><a href="#"> Login</a></li>
                                            <li><a href="#"> Contact us</a></li>
                                            <li><a href="#"> My account</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!--Single Footer end-->
                            <!--Single footer start-->   
                            <div class="single_footer widget">
                                <div class="single_footer_widget_inner">   
                                    <div class="footer_title">
                                        <h2> Your account </h2>
                                    </div>
                                    <div class="footer_menu">
                                        <ul>
                                            <li><a href="#">Personal info</a></li>
                                            <li><a href="#"> Orders</a></li>
                                            <li><a href="#"> Login</a></li>
                                            <li><a href="#"> Credit slips</a></li>
                                            <li><a href="#"> Addresses</a></li>
                                        </ul> 
                                    </div>
                                </div>
                            </div>
                            <!--Single Footer end-->
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-12 col-xs-12">
                        <div class="footer_title">
                            <h2> Join Our Newsletter Now </h2>
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
    @endsection