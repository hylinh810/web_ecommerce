@extends('front.layout.master')
@section('title', 'Sản phẩm')
@section('css')
    <link rel="stylesheet" href="/front/coupons/coupon.css">
@endsection
@section('body')
    <!--organicfood wrapper start-->
    <div class="organic_food_wrapper">
        <!--Header start-->
        <header class="header sticky-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="header_wrapper_inner">
                            <div class="logo col-xs-12">
                                <a href="/">
                                    <img src="assets/img/logo/logo1.png" alt="" />
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
                                            <input name="search" type="text" placeholder="Tìm kiếm"
                                                value="{{ request('search') }}" />
                                            <button type="submit">
                                                <i class="ion-ios-search"></i>
                                            </button>
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
                            <img src="assets/img/cart/1.jpg" alt="" />
                            <span class="cart_count">1</span>
                          </a>
                        </div>
                        <div class="cart_info">
                          <h5>
                            <a href="product-details.html">Mushroom Burger</a>
                          </h5>
                          <span class="cart_price">$75.99</span>
                        </div>
                        <div class="cart_remove">
                          <a href="#"><i class="zmdi zmdi-delete"></i></a>
                        </div>
                      </div>
                      <div class="mini_cart_item">
                        <div class="mini_cart_img">
                          <a href="#">
                            <img src="assets/img/cart/2.jpg" alt="" />
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
                            <li>
                                <a href="shop">view-shop ></a>
                            </li>
                            <li>
                                {{-- <a href="shop/danh-muc/{{ $product->productCategory->alias }}">{{ $product->productCategory->name }} --}}
                                ></a>
                            </li>
                            {{-- <li>{{ $product->product_name }}</li> --}}
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumb area end-->


    <div class="product_page_tab ptb-100">
        <div class="container">
            <div class="row">
                <div class="product-section">
                    <div class="product">
                        <img src="{{ asset('storage/' . $shop->image) }}" alt="Shop Image" class="view-shop-avt">

                    </div>
                </div>
                <div class="shop-section">
                    <div class="demo_product" style="margin-top: 60px;">
                        <h1>{{ $shop->name }}</h1>
                        @if ($shop->status == 'Đã xác nhận')
                            <p>Hoạt động</p>
                        @else
                            <p>{{ $shop->status }}</p>
                        @endif
                    </div>
                    {{-- <a href="view-shop" class="btn btn-primary">View Shop</a> --}}
                </div>

                <div class="shop-section">
                    <div class="demo_product" style="margin-top: 60px;">
                        <p>Địa chỉ:{{ $shop->address }}, {{ $shop->getWard->name }}, {{ $shop->getDistrict->name }},
                            {{ $shop->getCity->name }}</p>
                        <p>Sđt: {{ $shop->phone }}</p>
                    </div>
                    {{-- <a href="view-shop" class="btn btn-primary">View Shop</a> --}}
                </div>
            </div>
        </div>
    </div>

    @if (!empty($coupons))
        <div class="coupon-container">
            <div class="owl-prev" onclick="scrollCoupons('left')">
                <i class="fa fa-angle-left"></i>
            </div>
            @foreach ($coupons as $index => $item)
                <div class="coupon">
                    <div class="coupon-body">
                        <div class="coupon-code">{{ $item->name }}</div>
                        <div class="coupon-description">
                            {{ $item->name }} tổng giá trị đơn hàng trên {{ number_format($item->total_order) }}đ
                            @if (!empty($item->max_discount))
                                (giảm tối đa {{ number_format($item->max_discount) }}đ)
                            @endif
                        </div>
                        <p>Mã {{ $item->code }}</p>
                    </div>
                    <div class="coupon-expiry">
                        Ngày hết hạn: {{ $item->expire_date }}
                    </div>
                </div>
            @endforeach

            <!-- Add more coupons here if needed -->

            <div class="owl-next" onclick="scrollCoupons('right')">
                <i class="fa fa-angle-right"></i>
            </div>
        </div>

    @endif



    <!--- shop_wrapper area  -->
    <div class="shop_wrapper ptb-30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-md-8 col-12">
                    <div class="shop_sidebar">
                        <div class="block_categories">
                            <div class="category_top_menu widget">
                                <div class="widget_title">
                                    <h3>Danh mục</h3>
                                </div>
                                <ul class="shop_toggle">
                                    @foreach ($categories as $category)
                                        @if ($category->published == 1)
                                            @if (count($category->products) > 0)
                                                <li><a
                                                        href="view-shop/danh-muc/{{ $category->shop_id }}/{{ $category->alias }}">{{ $category->name }}</a>
                                                </li>
                                            @endif
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        {{-- <div class="search_filters_wrapper">
                                    <div class="price_filter widget">
                                        <div class="widget_title">
                                            <h3>Lọc theo giá</h3>
                                        </div>
                                        <div class="search_filters widget">
                                            <input type="text" name="min_price" id="min_price" readonly />
                                            <input type="text" name="max_price" id="max_price" readonly />
                                            <div id="slider-range"
                                                data-min-value="{{ str_replace('₫', '', request('min_price')) }}"
                                                data-max-value="{{ str_replace('₫', '', request('max_price')) }}"></div>
                                            <button class="button_filter" type="submit">Lọc</button>
                                        </div>

                                    </div>
                                </div> --}}
                    </div>
                </div>
                <div class="col-lg-9 col-md-12 col-12">
                    {{-- <div class="tav_menu_wrapper">
                                <div class="row align-items-center">
                                    <div class="col-lg-6 col-md-7 col-sm-6">
                                        <div class="tab_menu shop_menu">
                                            <div class="tab_menu_inner">
                                                <ul class="nav" role="tablist">
                                                    
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-5 col-sm-6">
                                        <div class="Relevance">
                                            <span>Sắp xếp:</span>
                                            <div class="dropdown dropdown-shop">
                                                <select name="sort_by" onchange="this.form.submit()" id="dropdown">
                                                    <option {{ request('sort_by') == 'latest' ? 'selected' : '' }}
                                                        value="latest">Mới nhất</option>
                                                    <option {{ request('sort_by') == 'name-ascending' ? 'selected' : '' }}
                                                        value="name-ascending">Tên A-Z</option>
                                                    <option {{ request('sort_by') == 'name-descending' ? 'selected' : '' }}
                                                        value="name-descending">Tên Z-A</option>
                                                    <option {{ request('sort_by') == 'price-ascending' ? 'selected' : '' }}
                                                        value="price-ascending">Giá thấp đến cao</option>
                                                    <option
                                                        {{ request('sort_by') == 'price-descending' ? 'selected' : '' }}
                                                        value="price-descending">Giá cao đến thấp</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                    <div class="tab_product_wrapper">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="shop_active">
                                <div class="row">
                                    @if (count($product) > 0)
                                        @foreach ($product as $product)
                                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                                                <div class="single__product">
                                                    <div class="single_product__inner">
                                                        {{-- <span class="new_badge">new</span> --}}
                                                        @if ($product->discount != null)
                                                            <span class="discount_price">Khuyến mãi</span>
                                                        @endif

                                                        <div class="product_img">
                                                            <a href="shop/san-pham/{{ $product->alias }}">
                                                                <img src="front/img/{{ $product->productImage[0]->path }}"
                                                                    style="height: 223px">
                                                            </a>
                                                        </div>
                                                        <div class="product__content text-center">
                                                            <div class="produc_desc_info">
                                                                <div class="product_title">
                                                                    <h4><a
                                                                            href="shop/san-pham/{{ $product->alias }}">{{ $product->product_name }}</a>
                                                                    </h4>
                                                                </div>
                                                                <div class="product_price">
                                                                    @if ($product->discount != null)
                                                                        <p>{{ number_format($product->discount, 0) }}<small>đ</small><strike
                                                                                style="margin-left: 10px;font-size: 14px;color: darkgray;font-weight: 500">{{ number_format($product->price, 0) }}đ</strike>
                                                                        </p>
                                                                    @else
                                                                        <p>{{ number_format($product->price, 0) }}<small>đ</small>
                                                                        </p>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="product__hover">
                                                                <ul>
                                                                    <li><a
                                                                            href="javascript:addCart({{ $product->id }},1)"><i
                                                                                class="ion-android-cart"></i></a>
                                                                    </li>
                                                                    {{-- <li><a class="cart-fore" href="#" data-toggle="modal" data-target="#my_modal"  title="Quick View" ><i class="ion-android-open"></i></a></li> --}}
                                                                    <li><a href="shop/san-pham/{{ $product->alias }}"><i
                                                                                class="ion-clipboard"></i></a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                                            <span style="text-align: center">
                                                Không tìm thấy sản phẩm
                                            </span>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            {{-- <div class="tab-pane fade" id="featured_active" role="tabpanel">
                                <div class="tab_product_bottom_wrapper">    
                                    <div class="row">
                                       <div class="col-lg-4 col-md-5 col-sm-5">
                                            <div class="single_product__inner inner_shop">
                                                <span class="new_badge">new</span>
                                                <span class="discount_price">-5%</span>
                                                <div class="product_img">
                                                    <a href="#">
                                                        <img src="assets/img/product/207.jpg" alt="">
                                                    </a>
                                                </div>

                                            </div> 
                                        </div> 
                                        <div class="col-lg-8 col-md-7 col-sm-7">
                                            <div class="product__content text-left">
                                                <div class="produc_desc_info">
                                                    <div class="product_title title_shop">
                                                        <h4><a href="product-details.html">Cheese Butter Burger</a></h4>
                                                    </div>
                                                    <div class="product_price price_shop">
                                                       <p class="regular_price">$65.51</p>
                                                        <p>$75.66</p>
                                                    </div>
                                                    <div class="product_content_shop">
                                                        <p>Faded short sleeves t-shirt with high neckline. Soft and stretchy material for a comfortable fit. Accessorize with a straw hat and you're ready for summer!</p>
                                                    </div>
                                                </div>
                                                <div class="product__hover hover_shop">
                                                   <div class="product_addto_cart">
                                                        <button type="submit">ADD TO CART</button> 
                                                   </div>
                                                   <div class="product_cart_icone">
                                                        <ul>
                                                            <li><a href="#"><i class="ion-android-cart"></i></a></li>
                                                            <li><a class="cart-fore" href="#" data-toggle="modal" data-target="#my_modal"  title="Quick View" ><i class="ion-android-open"></i></a></li>

                                                            <li><a href="product-details.html"><i class="ion-clipboard"></i></a></li>
                                                        </ul>
                                                    </div>    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
     
                            </div> --}}
                        </div>

                    </div>
                    {{-- <div class="float-right">
    {{ $product->links() }}
</div> --}}

                </div>
            </div>
        </div>
    </div>
    <!--- shop_wrapper area end  -->

    <!--Features product area-->
    <div class="features_product">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section_title text-left">
                        <h3>Sản phẩm liên quan</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="related_product_active owl-carousel">
                    @foreach ($relatedProducts as $item)
                        <div class="col-lg-2">
                            <div class="single__product">
                                <div class="single_product__inner">
                                    @if ($item->discount != null)
                                        <span class="discount_price">Khuyến mãi</span>
                                    @endif
                                    <div class="product_img">
                                        <a href="shop/san-pham/{{ $item->alias }}">
                                            <img src="front/img/{{ $item->productImage[0]->path }}" alt="" />
                                        </a>
                                    </div>
                                    <div class="product__content text-center">
                                        <div class="produc_desc_info">
                                            <div class="product_title">
                                                <h4>
                                                    <a
                                                        href="shop/san-pham/{{ $item->alias }}">{{ $item->product_name }}</a>
                                                </h4>
                                            </div>
                                            <div class="product_price">
                                                @if ($item->discount != null)
                                                    <p>{{ number_format($item->discount, 0) }}<small>đ</small></p>
                                                    <h6 style="text-decoration: line-through;color: darkgray">
                                                        {{ number_format($item->price, 0) }}<small>đ</small></h6>
                                                @else
                                                    <p>{{ number_format($item->price, 0) }}<small>đ</small></p>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="product__hover">
                                            <ul>
                                                <li>
                                                    <a href="javascript:addCart({{ $item->id }},1)"><i
                                                            class="ion-android-cart"></i></a>
                                                </li>
                                                {{-- <li>
                                                    <a class="cart-fore" href="#" data-toggle="modal"
                                                        data-target="#my_modal" title="Quick View"><i
                                                            class="ion-android-open"></i></a>
                                                </li> --}}
                                                <li>
                                                    <a href="shop/san-pham/{{ $item->alias }}"><i
                                                            class="ion-clipboard"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!--Features product end-->

    <div class="organic_food_wrapper">


        <!-- footer start -->
        <footer class="footer pt-90 my-account">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-md-12 col-xs-12">
                        <!--Single Footer-->
                        <div class="single_footer widget">
                            <div class="single_footer_widget_inner">
                                <div class="footer_logo">
                                    <a href="#"><img src="assets/img/logo/logo1.png" alt="" /></a>
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
                                    <input type="email" required placeholder="Your Email Address" />
                                    <input type="submit" value="Subscribe" />
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
    </div>

    <!-- footer end -->

    <!--organicfood wrapper end-->

    <!-- modal area start -->
    <script src="assets/js/vendor/jquery-1.12.0.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            loadComment();

            function sendComment() {
                $product_id = $('#product_id').val();
                $name = $('#name').val();
                $comment = $('#comment').val();
                $user_id = $('#user_id').val();
                $.ajax({
                    url: 'ajax/shop/post-comment',
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('input[name="_token"]').val()
                    },
                    data: {
                        'product_id': $product_id,
                        'name': $name,
                        'comment': $comment,
                        'user_id': $user_id
                    },
                    success: function() {
                        loadComment();
                        $('#name').val('');
                        $('#comment').val('');
                        setTimeout(function() {
                            $("#send-comment").removeAttr("disabled");
                        }, 15000);
                    }
                });
            }

            $('#send-comment').click(function(e) {
                e.preventDefault();
                $name = $('#name').val();
                $comment = $('#comment').val();
                if ($name.length < 3 || $name.length > 50) {
                    $('#error').html(
                        `<span class="text-danger">Vui lòng điền tên lớn hơn 3 kí tự và nhỏ hơn 50 kí tự</span>`
                    );
                    $('#name').addClass('invalid');
                } else {
                    $('#error').html('');
                    $('#name').removeClass('invalid');
                }
                if ($comment.length < 10) {
                    $('#error-comment').html(
                        `<span class="text-danger">Vui lòng điền nội dung lớn hơn 10 kí tự</span>`);
                    $('#comment').addClass('invalid');
                } else {
                    $('#error-comment').html('');
                    $('#comment').removeClass('invalid');
                }
                if ($comment.length >= 10 && ($name.length >= 3 && $name.length <= 50)) {
                    $('#error').html('');
                    $('#error-comment').html('');
                    $('#name').removeClass('invalid');
                    $('#comment').removeClass('invalid');
                    $('#send-comment').attr('disabled', true);
                    sendComment();
                }
            });

            function loadComment() {
                $product_id = $('#product_id').val();
                $('#product-comment').load("ajax/shop/load-comment/" + $product_id);
            }
            setInterval(function() {
                loadComment();
            }, 5000);

            $('#addCart').click(function() {
                $product_id = $('#product_id').val();
                addToCart($product_id);
            });

            function addToCart(product_id) {
                $qty = $('#qty').val();
                $.ajax({
                    url: "gio-hang/add",
                    type: "GET",
                    data: {
                        product_id: product_id,
                        product_qty: $qty,
                    },
                    success: function(data) {
                        if (data["error"] != null) {
                            $(".outofstock").fadeIn().delay(1000).fadeOut();
                        } else {
                            $(".cart_count").html(data["cart_count"]);
                            $(".message").fadeIn().delay(1000).fadeOut();
                        }
                    },
                    error: function() {
                        alert("Looix");
                    },
                });
            }
        });
    </script>
@endsection
<!-- modal area end -->

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">

@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
    <script>
        $(function() {
            var averageRating = parseFloat($("#averageRating").text());

            $("#rateYo").rateYo({
                rating: averageRating,
                readOnly: true,
                starWidth: "20px", // Adjust the star size as needed
                multiColor: {
                    "startColor": "#FF0000", // Red for the lowest rating
                    "endColor": "#F39C12", // Green for the highest rating
                },
            });
        });
    </script>

    <script>
        $(function() {
            $(".rateYo").each(function() {
                var rating = $(this).data('rating');
                $(this).rateYo({
                    rating: rating,
                    readOnly: true,
                    starWidth: "20px",
                    multiColor: {
                        "startColor": "#FF0000",
                        "endColor": "#F39C12",
                    },
                });
            });
        });
    </script>
    <script>
        function scrollCoupons(direction) {
            var container = document.querySelector('.coupon-container');
            var scrollAmount = 300; // Adjust the scroll amount as needed

            if (direction === 'left') {
                container.scrollLeft -= scrollAmount;
            } else if (direction === 'right') {
                container.scrollLeft += scrollAmount;
            }
        }
    </script>

@endsection
