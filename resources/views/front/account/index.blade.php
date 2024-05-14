@extends('front.layout.master')
@section('title', 'Thông tin cá nhân')
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
                                                                document.getElementById('logout-form').submit();">
                                                                Đăng xuất</a></li>
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
                            <li><a href="">Trang chủ</a> ></li>
                            <li>Thông tin cá nhân</li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumb area end-->

    <!-- Start Maincontent  -->
    <section class="main-content-area my-account ptb-50">
        <div class="container">
            <div class="account-dashboard">
                <div class="row">
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <!-- Nav tabs -->


                        <ul role="tablist" class="nav flex-column dashboard-list">
                            <li><a href="thong-tin-ca-nhan" class="nav-link active">Thông tin cá nhân</a></li>
                            <li> <a href="thong-tin-ca-nhan/don-hang" class="nav-link">Quản lý đơn hàng</a></li>
                            <li> <a href="thong-tin-ca-nhan/feedback" class="nav-link ">Đánh giá sản phẩm</a></li>
                            <li><a href="thong-tin-ca-nhan/doi-mat-khau" class="nav-link">Thay đổi mật khẩu</a></li>
                            <li><a href="log-out"
                                    onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"
                                    class="nav-link">Đăng xuất</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-12 col-md-9 col-lg-9">
                        <!-- Tab panes -->
                        <div class="tab-content dashboard-content">
                            <div class="tab-pane fade show active" id="account-details">


                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="custom-file">

                                        </div>
                                    </div>
                                </div>
                                @if (Session::has('success'))
                                    <div class="alert alert-success">
                                        <span>{{ Session::get('success') }}</span>
                                    </div>
                                @endif
                                <h3>Thông tin cá nhân </h3>
                                <div class="login">
                                    <div class="login-form-container">
                                        <div class="account-login-form">
                                            <form action="" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div style="margin-bottom: 20px">
                                                    <label for="exampleInputFile">Hình ảnh</label>
                                                    <img id="img1" src="assets/img/empty.jpg"
                                                        style="width: 200px;margin-left: 10px;" />
                                                        <input type="file" name="image" onchange="document.getElementById('img1').src = window.URL.createObjectURL(this.files[0])">
                                                    
                                                </div>
                                                <label>Họ và tên</label>
                                                <input type="text" name="name" value="{{ Auth::user()->name }}"
                                                    required>
                                                <div style="margin-bottom: 20px">
                                                    <label>Địa chỉ email</label>
                                                    <input style="margin-bottom: 0px;" required type="email"
                                                        name="email" value="{{ Auth::user()->email }}">
                                                    @if ($errors->has('email'))
                                                        <span class="text-danger mb-20">
                                                            <strong>{{ $errors->first('email') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                                <div style="margin-bottom: 20px">
                                                    <label>Số điện thoại</label>
                                                    <input type="text" name="phone" required
                                                        value="{{ Auth::user()->phone }}" style="margin-bottom: 0px">
                                                    @if ($errors->has('phone'))
                                                        <span class="text-danger mb-20">
                                                            <strong>{{ $errors->first('phone') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>

                                                <label>Thành phố</label>
                                                <select required name="city" id="city" class="choose-city">
                                                    @if ($city)
                                                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                                                    @else
                                                        @foreach ($cities as $city)
                                                            <option value="{{ $city->id }}">{{ $city->name }}
                                                            </option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                                <label>Quận huyện</label>
                                                <select required name="district" id="district" class="choose-district">
                                                    @if ($district)
                                                        <option value="{{ $district->id }}">{{ $district->name }}
                                                        </option>
                                                    @else
                                                        <option disabled>----Chọn quận huyện----</option>
                                                    @endif
                                                </select>
                                                <label>Phường xã</label>
                                                <select required name="ward" id="ward" class="choose-ward">

                                                    @if ($ward)
                                                        <option value="{{ $ward->id }}">{{ $ward->name }}</option>
                                                    @else
                                                        <option disabled>----Chọn phường xã----</option>
                                                    @endif
                                                </select>
                                                <label>Địa chỉ</label>
                                                <input type="text" name="address"
                                                    value="{{ Auth::user()->address }}">
                                                <label>Ngày sinh nhật</label>
                                                <input type="date" name="birthdate"
                                                    value="{{ Auth::user()->birthdate }}">
                                                <div class="save-button primary-btn default-button">
                                                    <button type="submit"
                                                        style="cursor: pointer;background:  #78a206;color: white;border: 1px solid white;padding: 10px 20px;border-radius: 10px">
                                                        Cập nhập
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Maincontent  -->

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
