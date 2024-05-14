@extends('front.layout.master')
@section('title', 'Quản lý đơn hàng')
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

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!--Header end-->
    </div>


    <div class="organic_food_wrapper blog_details">
        <!--Header start-->
        <header class="header sticky-header">
            <div class="container-fluid">
                <div>
                    @foreach ($product as $product)
                        <div class="product_img">
                            <img src="front/img/{{ $product->productImage[0]->path }}" style="height: 223px" />
                        </div>
                        <h4>
                            <a href="shop/san-pham/{{ $product->alias }}">{{ $product->product_name }}</a>
                        </h4>
                        @if ($product->discount != null)
                            <p>{{ number_format($product->discount, 0) }}<small>đ</small>
                                <strike
                                    style="margin-left: 10px;font-size: 14px;color: darkgray;font-weight: 500">{{ number_format($product->price, 0) }}đ</strike>
                            </p>
                        @else
                            <p>{{ number_format($product->price, 0) }}<small>đ</small></p>
                        @endif
                    @endforeach
                </div>
                <div>

                    <form action="{{ route('reviews.store', ['productId' => $productId, 'orderId' => $orderId]) }}" method="POST">
                        @csrf

                        <label for="rating">Chất lượng sản phẩm</label>
                        <div id="rateYo"></div>
                        <input type="hidden" name="rating" id="rating">
                        {{-- <p>{{$orderId}}</p> --}}

                        <label for="comment">Bình luận</label>
                        <textarea name="comment_content" id="comment" rows="4" cols="50"></textarea>
                        <div class="blog_leave_btn">
                            <button type="submit">Đánh giá</button>
                        </div>

                    </form>
                </div>
            </div>
        </header>
    </div>



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
        $(function() {

            $("#rateYo").rateYo({
                // Your RateYo options
                onSet: function(rating, rateYoInstance) {
                    // Set the value of the hidden input
                    $("#rating").val(rating);
                }
            });

        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
@endsection
