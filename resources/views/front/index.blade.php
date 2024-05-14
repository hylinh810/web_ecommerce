@extends('front.layout.master')
@section('title', 'Trang chủ')
@section('style')
    <link rel="stylesheet" href="/front/industry/style.css">

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
                                            <li class="active">
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
                                            <li class="active">
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

        <div class="slider_area">
            <div class="slider_list owl-carousel">
                @foreach ($posters as $poster)
                    <div class="single_slide" style="background-image: url(front/poster/{{ $poster->image }})">
                        <div class="container">
                            <div class="row">
                            <div class="col-12">
                                <div class="slider__content">
                                    <p>{{$poster->name}}</p>
                                    <h3>{{$poster->content}}</h3>
                                    <h6></h6>
                                    <div class="slider_btn">
                                        <a href="shop">Shopping now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                @endforeach
                {{-- <div class="single_slide" style="background-image: url(assets/img/slider/2.jpg)">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="slider__content">
                                    <p>Khuyến mãi ưu đãi cuối tuần</p>
                                    <h2>Chúng tôi <strong>cung cấp</strong> sản phẩm</h2>
                                    <h3>tốt nhất <strong> dành cho bạn </strong></h3>
                                    <div class="slider_btn">
                                        <a href="shop">Shopping now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
        <!--Slider end-->

        <!--Banner area start-->
        <div class="banner_area home1_banner mt-30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="single_banner">
                            <a href="#">
                                <img src="assets/img/banner/1.jpg" alt="" />
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="single_banner">
                            <a href="#">
                                <img src="assets/img/banner/2.jpg" alt="" />
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="single_banner banner_three">
                            <a href="#">
                                <img src="assets/img/banner/3.jpg" alt="" />
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Banner area end-->

        <div class="features_product pt-90">
            <div class="container-fluid">
                <div class="row">
                    <div class="features_product_active owl-carousel">
                        @foreach ($industries as $industry)
                            <div class="col-lg-2" style="width:150px; text-align:center; ">
                                <div class="single_product__inner">
                                    <a href="shop/danh-muc/{{ $industry->alias }}">
                                        <h5 style="color: #78a206">{{ $industry->name }}</h5>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <!--Features product area-->
        <div class="features_product pt-90">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="section_title text-center">
                            <h3>đề xuất</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="features_product_active owl-carousel">
                        @foreach ($productDetails as $product)
                            <div class="col-lg-2">
                                <div class="single__product">
                                    <div class="single_product__inner">
                                        {{-- <span class="new_badge">new</span> --}}
                                        @if ($product['discount'] !== null)
                                            <span class="discount_price">Khuyến mãi</span>
                                        @endif

                                        <div class="product_img">
                                            <a href="shop/san-pham/{{ $product['alias'] }}">
                                                <img src="front/img/{{ $product['image'] }}" style="height: 223px" />
                                            </a>
                                        </div>
                                        <div class="product__content text-center">
                                            <div class="produc_desc_info">
                                                <div class="product_title">
                                                    <h4>
                                                        <a
                                                            href="shop/san-pham/{{ $product['alias'] }}">{{ $product['product_name'] }}</a>
                                                    </h4>
                                                </div>
                                                <div class="product_price">
                                                    @if ($product['discount'] !== null)
                                                        <p>{{ number_format($product['discount'], 0) }}<small>đ</small>
                                                            <strike
                                                                style="margin-left: 10px;
                                                                font-size: 14px;
                                                                color: darkgray;
                                                                font-weight: 500">
                                                                {{ number_format($product['price'], 0) }}đ
                                                            </strike>
                                                        </p>
                                                    @else
                                                        <p>{{ number_format($product['price'], 0) }}<small>đ</small></p>
                                                    @endif
                                                </div>
                                                @if ($product['avg_rating'] !== null)
                                                    <div class="product_rating">
                                                        @php
                                                            $fullStars = floor($product['avg_rating']);
                                                            $fractionalStar = $product['avg_rating'] - $fullStars;
                                                        @endphp

                                                        {{-- Full stars --}}
                                                        @for ($i = 1; $i <= $fullStars; $i++)
                                                            <i class="ion-android-star" style="color: #F39C12;"></i>
                                                        @endfor

                                                        {{-- Fractional star --}}
                                                        @if ($fractionalStar > 0)
                                                            <i class="ion-android-star-half" style="color: #F39C12;"></i>
                                                        @endif

                                                        {{-- Empty stars --}}
                                                        @for ($i = ceil($product['avg_rating']); $i <= 4; $i++)
                                                            <i class="ion-android-star-outline"
                                                                style="color: #F39C12;"></i>
                                                        @endfor
                                                    </div>
                                                @endif


                                            </div>
                                            <div class="product__hover">
                                                <ul>
                                                    <li>
                                                        <a href="javascript:addCart({{ $product['productId'] }},1)"><i
                                                                class="ion-android-cart"></i></a>
                                                    </li>
                                                    <li>
                                                        <a href="shop/san-pham/{{ $product['alias'] }}"><i
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

        <!--Features product area-->
        @if (!empty($productRecommend))
        <div class="features_product pt-90">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="section_title text-center">
                            <h3>bạn có thể thích</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="features_product_active owl-carousel">
                        @foreach ($productRecommend as $product)
                            <div class="col-lg-2">
                                <div class="single__product">
                                    <div class="single_product__inner">
                                        {{-- <span class="new_badge">new</span> --}}
                                        @if ($product['discount'] !== null)
                                            <span class="discount_price">Khuyến mãi</span>
                                        @endif

                                        <div class="product_img">
                                            <a href="shop/san-pham/{{ $product['alias'] }}">
                                                <img src="front/img/{{ $product['image'] }}" style="height: 223px" />
                                            </a>
                                        </div>
                                        <div class="product__content text-center">
                                            <div class="produc_desc_info">
                                                <div class="product_title">
                                                    <h4>
                                                        <a
                                                            href="shop/san-pham/{{ $product['alias'] }}">{{ $product['product_name'] }}</a>
                                                    </h4>
                                                </div>
                                                <div class="product_price">
                                                    @if ($product['discount'] !== null)
                                                        <p>{{ number_format($product['discount'], 0) }}<small>đ</small>
                                                            <strike
                                                                style="margin-left: 10px;
                                                                font-size: 14px;
                                                                color: darkgray;
                                                                font-weight: 500">
                                                                {{ number_format($product['price'], 0) }}đ
                                                            </strike>
                                                        </p>
                                                    @else
                                                        <p>{{ number_format($product['price'], 0) }}<small>đ</small></p>
                                                    @endif
                                                </div>
                                                @if ($product['avg_rating'] !== null)
                                                    <div class="product_rating">
                                                        @php
                                                            $fullStars = floor($product['avg_rating']);
                                                            $fractionalStar = $product['avg_rating'] - $fullStars;
                                                        @endphp

                                                        {{-- Full stars --}}
                                                        @for ($i = 1; $i <= $fullStars; $i++)
                                                            <i class="ion-android-star" style="color: #F39C12;"></i>
                                                        @endfor

                                                        {{-- Fractional star --}}
                                                        @if ($fractionalStar > 0)
                                                            <i class="ion-android-star-half" style="color: #F39C12;"></i>
                                                        @endif

                                                        {{-- Empty stars --}}
                                                        @for ($i = ceil($product['avg_rating']); $i <= 4; $i++)
                                                            <i class="ion-android-star-outline"
                                                                style="color: #F39C12;"></i>
                                                        @endfor
                                                    </div>
                                                @endif


                                            </div>
                                            <div class="product__hover">
                                                <ul>
                                                    <li>
                                                        <a href="javascript:addCart({{ $product['productId'] }},1)"><i
                                                                class="ion-android-cart"></i></a>
                                                    </li>
                                                    <li>
                                                        <a href="shop/san-pham/{{ $product['alias'] }}"><i
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
        @endif
        <!--Features product end-->

        <!--Shipping area start-->
        <div class="shipping_area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="shipping_list d-flex justify-content-between flex-xs-column">
                            <div class="single_shipping_box d-flex">
                                <div class="shipping_icon">
                                    <img src="assets/img/ship/1.png" alt="shipping icon" />
                                </div>
                                <div class="shipping_content">
                                    <h6>Miễn phí giao hàng</h6>
                                    <p>Với đơn hàng từ 500k</p>
                                </div>
                            </div>
                            <div class="single_shipping_box one d-flex">
                                <div class="shipping_icon">
                                    <img src="assets/img/ship/2.png" alt="shipping icon" />
                                </div>
                                <div class="shipping_content">
                                    <h6>Hoàn tiền</h6>
                                    <p>Trong vòng 7 ngày</p>
                                </div>
                            </div>
                            <div class="single_shipping_box two d-flex">
                                <div class="shipping_icon">
                                    <img src="assets/img/ship/3.png" alt="shipping icon" />
                                </div>
                                <div class="shipping_content">
                                    <h6>Giảm giá</h6>
                                    <p>Cho các thành viên VIP</p>
                                </div>
                            </div>
                            <div class="single_shipping_box three d-flex">
                                <div class="shipping_icon">
                                    <img src="assets/img/ship/4.png" alt="shipping icon" />
                                </div>
                                <div class="shipping_content">
                                    <h6>Hỗ Trợ 24/7</h6>
                                    <p>Hotline: 0926069058</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Shipping area end-->

        <!--shop product area start-->
        {{-- <div class="shop_product">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div
              class="shop_product_head d-flex justify-content-between mb-30"
            >
              <div class="section_title space_2 text-left">
                <h3>shop</h3>
              </div>
              <div class="home_shop_product text-right">
                <ul
                  class="product-tab-list nav d-flex flex-wrap justify-content-end"
                  role="tablist"
                >
                  <li>
                    <a
                      class="active"
                      href="#fresh"
                      data-toggle="tab"
                      role="tab"
                      aria-selected="true"
                      aria-controls="fresh"
                    >
                      Fresh Fruit
                    </a>
                  </li>
                  <li>
                    <a
                      href="#flowers"
                      data-toggle="tab"
                      role="tab"
                      aria-selected="false"
                      aria-controls="flowers"
                    >
                      Flowers
                    </a>
                  </li>
                  <li>
                    <a
                      href="#organics"
                      data-toggle="tab"
                      role="tab"
                      aria-selected="false"
                      aria-controls="organics"
                      >Organics
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4 col-md-6">
            <div class="shop_larg_product">
              <div class="single__product_2">
                <div class="product_img">
                  <a href="#">
                    <img src="assets/img/product/big-1.jpg" alt="" />
                  </a>
                </div>
                <div class="product__content text-center">
                  <div class="product_title">
                    <h4>
                      <a href="product-details.html"
                        >Wayfarer Messenger Bag</a
                      >
                    </h4>
                  </div>
                  <div class="product_price">
                    <p>$65.66</p>
                  </div>
                  <div class="product-add-to-cart">
                    <a href="#">add to cart</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-8 col-md-6">
            <div class="tab-content">
              <div
                class="tab-pane active show fade"
                id="fresh"
                role="tabpanel"
              >
                <div class="row">
                  <div class="shop-product_list owl-carousel">
                    <div class="col-12">
                      <div class="shop_single_prduct_item">
                        <div class="single__product">
                          <div class="single_product__inner">
                            <span class="new_badge">new</span>
                            <div class="product_img">
                              <a href="#">
                                <img src="assets/img/product/1.jpg" alt="" />
                              </a>
                            </div>
                            <div class="product__content text-center">
                              <div class="produc_desc_info">
                                <div class="product_title">
                                  <h4>
                                    <a href="product-details.html"
                                      >Healthy Melt</a
                                    >
                                  </h4>
                                </div>
                                <div class="product_price">
                                  <p>$90.66</p>
                                </div>
                              </div>
  
                              <div class="product__hover">
                                <ul>
                                  <li>
                                    <a href="#"
                                      ><i class="ion-android-cart"></i
                                    ></a>
                                  </li>
                                  <li>
                                    <a
                                      class="cart-fore"
                                      href="#"
                                      data-toggle="modal"
                                      data-target="#my_modal"
                                      title="Quick View"
                                      ><i class="ion-android-open"></i
                                    ></a>
                                  </li>
                                  <li>
                                    <a href="product-details.html"
                                      ><i class="ion-clipboard"></i
                                    ></a>
                                  </li>
                                </ul>
                              </div>
                            </div>
                          </div>
                        </div>
  
                        <div class="single__product">
                          <div class="single_product__inner">
                            <span class="new_badge">new</span>
                            <div class="product_img">
                              <a href="#">
                                <img src="assets/img/product/2.jpg" alt="" />
                              </a>
                            </div>
                            <div class="product__content text-center">
                              <div class="produc_desc_info">
                                <div class="product_title">
                                  <h4>
                                    <a href="product-details.html"
                                      >Healthy Melt</a
                                    >
                                  </h4>
                                </div>
                                <div class="product_price">
                                  <p>$90.66</p>
                                </div>
                              </div>
  
                              <div class="product__hover">
                                <ul>
                                  <li>
                                    <a href="#"
                                      ><i class="ion-android-cart"></i
                                    ></a>
                                  </li>
                                  <li>
                                    <a
                                      class="cart-fore"
                                      href="#"
                                      data-toggle="modal"
                                      data-target="#my_modal"
                                      title="Quick View"
                                      ><i class="ion-android-open"></i
                                    ></a>
                                  </li>
                                  <li>
                                    <a href="product-details.html"
                                      ><i class="ion-clipboard"></i
                                    ></a>
                                  </li>
                                </ul>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="shop_single_prduct_item">
                        <div class="single__product">
                          <div class="single_product__inner">
                            <span class="new_badge">new</span>
                            <div class="product_img">
                              <a href="#">
                                <img src="assets/img/product/11.jpg" alt="" />
                              </a>
                            </div>
                            <div class="product__content text-center">
                              <div class="produc_desc_info">
                                <div class="product_title">
                                  <h4>
                                    <a href="product-details.html"
                                      >Fusce nec facilisi</a
                                    >
                                  </h4>
                                </div>
                                <div class="product_price">
                                  <p>$50.66</p>
                                </div>
                              </div>
                              <div class="product__hover">
                                <ul>
                                  <li>
                                    <a href="#"
                                      ><i class="ion-android-cart"></i
                                    ></a>
                                  </li>
                                  <li>
                                    <a
                                      class="cart-fore"
                                      href="#"
                                      data-toggle="modal"
                                      data-target="#my_modal"
                                      title="Quick View"
                                      ><i class="ion-android-open"></i
                                    ></a>
                                  </li>
                                  <li>
                                    <a href="product-details.html"
                                      ><i class="ion-clipboard"></i
                                    ></a>
                                  </li>
                                </ul>
                              </div>
                            </div>
                          </div>
                        </div>
  
                        <div class="single__product">
                          <div class="single_product__inner">
                            <span class="new_badge">new</span>
                            <div class="product_img">
                              <a href="#">
                                <img src="assets/img/product/12.jpg" alt="" />
                              </a>
                            </div>
                            <div class="product__content text-center">
                              <div class="produc_desc_info">
                                <div class="product_title">
                                  <h4><a href="#">Double Cheese</a></h4>
                                </div>
                                <div class="product_price">
                                  <p>$55.66</p>
                                </div>
                              </div>
                              <div class="product__hover">
                                <ul>
                                  <li>
                                    <a href="#"
                                      ><i class="ion-android-cart"></i
                                    ></a>
                                  </li>
                                  <li>
                                    <a
                                      class="cart-fore"
                                      href="#"
                                      data-toggle="modal"
                                      data-target="#my_modal"
                                      title="Quick View"
                                      ><i class="ion-android-open"></i
                                    ></a>
                                  </li>
                                  <li>
                                    <a href="product-details.html"
                                      ><i class="ion-clipboard"></i
                                    ></a>
                                  </li>
                                </ul>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="shop_single_prduct_item">
                        <div class="single__product">
                          <div class="single_product__inner">
                            <span class="new_badge">new</span>
                            <div class="product_img">
                              <a href="#">
                                <img src="assets/img/product/5.jpg" alt="" />
                              </a>
                            </div>
                            <div class="product__content text-center">
                              <div class="produc_desc_info">
                                <div class="product_title">
                                  <h4>
                                    <a href="product-details.html"
                                      >Sprite Yoga Straps1</a
                                    >
                                  </h4>
                                </div>
                                <div class="product_price">
                                  <p>$70.66</p>
                                </div>
                              </div>
                              <div class="product__hover">
                                <ul>
                                  <li>
                                    <a href="#"
                                      ><i class="ion-android-cart"></i
                                    ></a>
                                  </li>
                                  <li>
                                    <a
                                      class="cart-fore"
                                      href="#"
                                      data-toggle="modal"
                                      data-target="#my_modal"
                                      title="Quick View"
                                      ><i class="ion-android-open"></i
                                    ></a>
                                  </li>
                                  <li>
                                    <a href="product-details.html"
                                      ><i class="ion-clipboard"></i
                                    ></a>
                                  </li>
                                </ul>
                              </div>
                            </div>
                          </div>
                        </div>
  
                        <div class="single__product">
                          <div class="single_product__inner">
                            <span class="new_badge">new</span>
                            <div class="product_img">
                              <a href="#">
                                <img src="assets/img/product/6.jpg" alt="" />
                              </a>
                            </div>
                            <div class="product__content text-center">
                              <div class="produc_desc_info">
                                <div class="product_title">
                                  <h4>
                                    <a href="product-details.html"
                                      >Wayfarer Messenger Bag</a
                                    >
                                  </h4>
                                </div>
                                <div class="product_price">
                                  <p>$55.66</p>
                                </div>
                              </div>
                              <div class="product__hover">
                                <ul>
                                  <li>
                                    <a href="#"
                                      ><i class="ion-android-cart"></i
                                    ></a>
                                  </li>
                                  <li>
                                    <a
                                      class="cart-fore"
                                      href="#"
                                      data-toggle="modal"
                                      data-target="#my_modal"
                                      title="Quick View"
                                      ><i class="ion-android-open"></i
                                    ></a>
                                  </li>
                                  <li>
                                    <a href="product-details.html"
                                      ><i class="ion-clipboard"></i
                                    ></a>
                                  </li>
                                </ul>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="shop_single_prduct_item">
                        <div class="single__product">
                          <div class="single_product__inner">
                            <span class="new_badge">new</span>
                            <div class="product_img">
                              <a href="#">
                                <img src="assets/img/product/7.jpg" alt="" />
                              </a>
                            </div>
                            <div class="product__content text-center">
                              <div class="produc_desc_info">
                                <div class="product_title">
                                  <h4>
                                    <a href="product-details.html"
                                      >Donec sem tellus</a
                                    >
                                  </h4>
                                </div>
                                <div class="product_price">
                                  <p>$45.66</p>
                                </div>
                              </div>
                              <div class="product__hover">
                                <ul>
                                  <li>
                                    <a href="#"
                                      ><i class="ion-android-cart"></i
                                    ></a>
                                  </li>
                                  <li>
                                    <a
                                      class="cart-fore"
                                      href="#"
                                      data-toggle="modal"
                                      data-target="#my_modal"
                                      title="Quick View"
                                      ><i class="ion-android-open"></i
                                    ></a>
                                  </li>
                                  <li>
                                    <a href="product-details.html"
                                      ><i class="ion-clipboard"></i
                                    ></a>
                                  </li>
                                </ul>
                              </div>
                            </div>
                          </div>
                        </div>
  
                        <div class="single__product">
                          <div class="single_product__inner">
                            <span class="new_badge">new</span>
                            <div class="product_img">
                              <a href="#">
                                <img src="assets/img/product/8.jpg" alt="" />
                              </a>
                            </div>
                            <div class="product__content text-center">
                              <div class="produc_desc_info">
                                <div class="product_title">
                                  <h4><a href="#">Country Burger</a></h4>
                                </div>
                                <div class="product_price">
                                  <p>$35.66</p>
                                </div>
                              </div>
                              <div class="product__hover">
                                <ul>
                                  <li>
                                    <a href="#"
                                      ><i class="ion-android-cart"></i
                                    ></a>
                                  </li>
                                  <li>
                                    <a
                                      class="cart-fore"
                                      href="#"
                                      data-toggle="modal"
                                      data-target="#my_modal"
                                      title="Quick View"
                                      ><i class="ion-android-open"></i
                                    ></a>
                                  </li>
                                  <li>
                                    <a href="product-details.html"
                                      ><i class="ion-clipboard"></i
                                    ></a>
                                  </li>
                                </ul>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="shop_single_prduct_item">
                        <div class="single__product">
                          <div class="single_product__inner">
                            <span class="new_badge">new</span>
                            <div class="product_img">
                              <a href="#">
                                <img src="assets/img/product/9.jpg" alt="" />
                              </a>
                            </div>
                            <div class="product__content text-center">
                              <div class="produc_desc_info">
                                <div class="product_title">
                                  <h4>
                                    <a href="product-details.html"
                                      >Chaz Kangeroo Hoodie3</a
                                    >
                                  </h4>
                                </div>
                                <div class="product_price">
                                  <p>$75.66</p>
                                </div>
                              </div>
                              <div class="product__hover">
                                <ul>
                                  <li>
                                    <a href="#"
                                      ><i class="ion-android-cart"></i
                                    ></a>
                                  </li>
                                  <li>
                                    <a
                                      class="cart-fore"
                                      href="#"
                                      data-toggle="modal"
                                      data-target="#my_modal"
                                      title="Quick View"
                                      ><i class="ion-android-open"></i
                                    ></a>
                                  </li>
                                  <li>
                                    <a href="product-details.html"
                                      ><i class="ion-clipboard"></i
                                    ></a>
                                  </li>
                                </ul>
                              </div>
                            </div>
                          </div>
                        </div>
  
                        <div class="single__product">
                          <div class="single_product__inner">
                            <span class="new_badge">new</span>
                            <div class="product_img">
                              <a href="#">
                                <img src="assets/img/product/10.jpg" alt="" />
                              </a>
                            </div>
                            <div class="product__content text-center">
                              <div class="produc_desc_info">
                                <div class="product_title">
                                  <h4>
                                    <a href="product-details.html"
                                      >Chaz Kangeroo Hoodie3</a
                                    >
                                  </h4>
                                </div>
                                <div class="product_price">
                                  <p>$75.66</p>
                                </div>
                              </div>
                              <div class="product__hover">
                                <ul>
                                  <li>
                                    <a href="#"
                                      ><i class="ion-android-cart"></i
                                    ></a>
                                  </li>
                                  <li>
                                    <a
                                      class="cart-fore"
                                      href="#"
                                      data-toggle="modal"
                                      data-target="#my_modal"
                                      title="Quick View"
                                      ><i class="ion-android-open"></i
                                    ></a>
                                  </li>
                                  <li>
                                    <a href="product-details.html"
                                      ><i class="ion-clipboard"></i
                                    ></a>
                                  </li>
                                </ul>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="shop_single_prduct_item">
                        <div class="single__product">
                          <div class="single_product__inner">
                            <span class="new_badge">new</span>
                            <div class="product_img">
                              <a href="#">
                                <img src="assets/img/product/11.jpg" alt="" />
                              </a>
                            </div>
                            <div class="product__content text-center">
                              <div class="produc_desc_info">
                                <div class="product_title">
                                  <h4>
                                    <a href="product-details.html"
                                      >Donec sem tellus</a
                                    >
                                  </h4>
                                </div>
                                <div class="product_price">
                                  <p>$45.66</p>
                                </div>
                              </div>
                              <div class="product__hover">
                                <ul>
                                  <li>
                                    <a href="#"
                                      ><i class="ion-android-cart"></i
                                    ></a>
                                  </li>
                                  <li>
                                    <a
                                      class="cart-fore"
                                      href="#"
                                      data-toggle="modal"
                                      data-target="#my_modal"
                                      title="Quick View"
                                      ><i class="ion-android-open"></i
                                    ></a>
                                  </li>
                                  <li>
                                    <a href="product-details.html"
                                      ><i class="ion-clipboard"></i
                                    ></a>
                                  </li>
                                </ul>
                              </div>
                            </div>
                          </div>
                        </div>
  
                        <div class="single__product">
                          <div class="single_product__inner">
                            <span class="new_badge">new</span>
                            <div class="product_img">
                              <a href="#">
                                <img src="assets/img/product/12.jpg" alt="" />
                              </a>
                            </div>
                            <div class="product__content text-center">
                              <div class="produc_desc_info">
                                <div class="product_title">
                                  <h4><a href="#">Country Burger</a></h4>
                                </div>
                                <div class="product_price">
                                  <p>$35.66</p>
                                </div>
                              </div>
                              <div class="product__hover">
                                <ul>
                                  <li>
                                    <a href="#"
                                      ><i class="ion-android-cart"></i
                                    ></a>
                                  </li>
                                  <li>
                                    <a
                                      class="cart-fore"
                                      href="#"
                                      data-toggle="modal"
                                      data-target="#my_modal"
                                      title="Quick View"
                                      ><i class="ion-android-open"></i
                                    ></a>
                                  </li>
                                  <li>
                                    <a href="product-details.html"
                                      ><i class="ion-clipboard"></i
                                    ></a>
                                  </li>
                                </ul>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="shop_single_prduct_item">
                        <div class="single__product">
                          <div class="single_product__inner">
                            <span class="new_badge">new</span>
                            <div class="product_img">
                              <a href="#">
                                <img src="assets/img/product/13.jpg" alt="" />
                              </a>
                            </div>
                            <div class="product__content text-center">
                              <div class="produc_desc_info">
                                <div class="product_title">
                                  <h4>
                                    <a href="product-details.html"
                                      >Chaz Kangeroo Hoodie3</a
                                    >
                                  </h4>
                                </div>
                                <div class="product_price">
                                  <p>$62.66</p>
                                </div>
                              </div>
                              <div class="product__hover">
                                <ul>
                                  <li>
                                    <a href="#"
                                      ><i class="ion-android-cart"></i
                                    ></a>
                                  </li>
                                  <li>
                                    <a
                                      class="cart-fore"
                                      href="#"
                                      data-toggle="modal"
                                      data-target="#my_modal"
                                      title="Quick View"
                                      ><i class="ion-android-open"></i
                                    ></a>
                                  </li>
                                  <li>
                                    <a href="product-details.html"
                                      ><i class="ion-clipboard"></i
                                    ></a>
                                  </li>
                                </ul>
                              </div>
                            </div>
                          </div>
                        </div>
  
                        <div class="single__product">
                          <div class="single_product__inner">
                            <span class="new_badge">new</span>
                            <div class="product_img">
                              <a href="#">
                                <img src="assets/img/product/8.jpg" alt="" />
                              </a>
                            </div>
                            <div class="product__content text-center">
                              <div class="produc_desc_info">
                                <div class="product_title">
                                  <h4>
                                    <a href="product-details.html"
                                      >Fusce nec facilisi</a
                                    >
                                  </h4>
                                </div>
                                <div class="product_price">
                                  <p>$68.66</p>
                                </div>
                              </div>
                              <div class="product__hover">
                                <ul>
                                  <li>
                                    <a href="#"
                                      ><i class="ion-android-cart"></i
                                    ></a>
                                  </li>
                                  <li>
                                    <a
                                      class="cart-fore"
                                      href="#"
                                      data-toggle="modal"
                                      data-target="#my_modal"
                                      title="Quick View"
                                      ><i class="ion-android-open"></i
                                    ></a>
                                  </li>
                                  <li>
                                    <a href="product-details.html"
                                      ><i class="ion-clipboard"></i
                                    ></a>
                                  </li>
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
              <div class="tab-pane fade" id="flowers" role="tabpanel">
                <div class="row">
                  <div class="shop-product_list owl-carousel">
                    <div class="col-12">
                      <div class="shop_single_prduct_item">
                        <div class="single__product">
                          <div class="single_product__inner">
                            <span class="new_badge">new</span>
                            <div class="product_img">
                              <a href="#">
                                <img src="assets/img/product/1.jpg" alt="" />
                              </a>
                            </div>
                            <div class="product__content text-center">
                              <div class="produc_desc_info">
                                <div class="product_title">
                                  <h4>
                                    <a href="product-details.html"
                                      >Healthy Melt</a
                                    >
                                  </h4>
                                </div>
                                <div class="product_price">
                                  <p>$90.66</p>
                                </div>
                              </div>
  
                              <div class="product__hover">
                                <ul>
                                  <li>
                                    <a href="#"
                                      ><i class="ion-android-cart"></i
                                    ></a>
                                  </li>
                                  <li>
                                    <a
                                      class="cart-fore"
                                      href="#"
                                      data-toggle="modal"
                                      data-target="#my_modal"
                                      title="Quick View"
                                      ><i class="ion-android-open"></i
                                    ></a>
                                  </li>
                                  <li>
                                    <a href="product-details.html"
                                      ><i class="ion-clipboard"></i
                                    ></a>
                                  </li>
                                </ul>
                              </div>
                            </div>
                          </div>
                        </div>
  
                        <div class="single__product">
                          <div class="single_product__inner">
                            <span class="new_badge">new</span>
                            <div class="product_img">
                              <a href="#">
                                <img src="assets/img/product/2.jpg" alt="" />
                              </a>
                            </div>
                            <div class="product__content text-center">
                              <div class="produc_desc_info">
                                <div class="product_title">
                                  <h4>
                                    <a href="product-details.html"
                                      >Healthy Melt</a
                                    >
                                  </h4>
                                </div>
                                <div class="product_price">
                                  <p>$90.66</p>
                                </div>
                              </div>
  
                              <div class="product__hover">
                                <ul>
                                  <li>
                                    <a href="#"
                                      ><i class="ion-android-cart"></i
                                    ></a>
                                  </li>
                                  <li>
                                    <a
                                      class="cart-fore"
                                      href="#"
                                      data-toggle="modal"
                                      data-target="#my_modal"
                                      title="Quick View"
                                      ><i class="ion-android-open"></i
                                    ></a>
                                  </li>
                                  <li>
                                    <a href="product-details.html"
                                      ><i class="ion-clipboard"></i
                                    ></a>
                                  </li>
                                </ul>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="shop_single_prduct_item">
                        <div class="single__product">
                          <div class="single_product__inner">
                            <span class="new_badge">new</span>
                            <div class="product_img">
                              <a href="#">
                                <img src="assets/img/product/11.jpg" alt="" />
                              </a>
                            </div>
                            <div class="product__content text-center">
                              <div class="produc_desc_info">
                                <div class="product_title">
                                  <h4>
                                    <a href="product-details.html"
                                      >Fusce nec facilisi</a
                                    >
                                  </h4>
                                </div>
                                <div class="product_price">
                                  <p>$50.66</p>
                                </div>
                              </div>
                              <div class="product__hover">
                                <ul>
                                  <li>
                                    <a href="#"
                                      ><i class="ion-android-cart"></i
                                    ></a>
                                  </li>
                                  <li>
                                    <a
                                      class="cart-fore"
                                      href="#"
                                      data-toggle="modal"
                                      data-target="#my_modal"
                                      title="Quick View"
                                      ><i class="ion-android-open"></i
                                    ></a>
                                  </li>
                                  <li>
                                    <a href="product-details.html"
                                      ><i class="ion-clipboard"></i
                                    ></a>
                                  </li>
                                </ul>
                              </div>
                            </div>
                          </div>
                        </div>
  
                        <div class="single__product">
                          <div class="single_product__inner">
                            <span class="new_badge">new</span>
                            <div class="product_img">
                              <a href="#">
                                <img src="assets/img/product/12.jpg" alt="" />
                              </a>
                            </div>
                            <div class="product__content text-center">
                              <div class="produc_desc_info">
                                <div class="product_title">
                                  <h4><a href="#">Double Cheese</a></h4>
                                </div>
                                <div class="product_price">
                                  <p>$55.66</p>
                                </div>
                              </div>
                              <div class="product__hover">
                                <ul>
                                  <li>
                                    <a href="#"
                                      ><i class="ion-android-cart"></i
                                    ></a>
                                  </li>
                                  <li>
                                    <a
                                      class="cart-fore"
                                      href="#"
                                      data-toggle="modal"
                                      data-target="#my_modal"
                                      title="Quick View"
                                      ><i class="ion-android-open"></i
                                    ></a>
                                  </li>
                                  <li>
                                    <a href="product-details.html"
                                      ><i class="ion-clipboard"></i
                                    ></a>
                                  </li>
                                </ul>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="shop_single_prduct_item">
                        <div class="single__product">
                          <div class="single_product__inner">
                            <span class="new_badge">new</span>
                            <div class="product_img">
                              <a href="#">
                                <img src="assets/img/product/5.jpg" alt="" />
                              </a>
                            </div>
                            <div class="product__content text-center">
                              <div class="produc_desc_info">
                                <div class="product_title">
                                  <h4>
                                    <a href="product-details.html"
                                      >Sprite Yoga Straps1</a
                                    >
                                  </h4>
                                </div>
                                <div class="product_price">
                                  <p>$70.66</p>
                                </div>
                              </div>
                              <div class="product__hover">
                                <ul>
                                  <li>
                                    <a href="#"
                                      ><i class="ion-android-cart"></i
                                    ></a>
                                  </li>
                                  <li>
                                    <a
                                      class="cart-fore"
                                      href="#"
                                      data-toggle="modal"
                                      data-target="#my_modal"
                                      title="Quick View"
                                      ><i class="ion-android-open"></i
                                    ></a>
                                  </li>
                                  <li>
                                    <a href="product-details.html"
                                      ><i class="ion-clipboard"></i
                                    ></a>
                                  </li>
                                </ul>
                              </div>
                            </div>
                          </div>
                        </div>
  
                        <div class="single__product">
                          <div class="single_product__inner">
                            <span class="new_badge">new</span>
                            <div class="product_img">
                              <a href="#">
                                <img src="assets/img/product/6.jpg" alt="" />
                              </a>
                            </div>
                            <div class="product__content text-center">
                              <div class="produc_desc_info">
                                <div class="product_title">
                                  <h4>
                                    <a href="product-details.html"
                                      >Wayfarer Messenger Bag</a
                                    >
                                  </h4>
                                </div>
                                <div class="product_price">
                                  <p>$55.66</p>
                                </div>
                              </div>
                              <div class="product__hover">
                                <ul>
                                  <li>
                                    <a href="#"
                                      ><i class="ion-android-cart"></i
                                    ></a>
                                  </li>
                                  <li>
                                    <a
                                      class="cart-fore"
                                      href="#"
                                      data-toggle="modal"
                                      data-target="#my_modal"
                                      title="Quick View"
                                      ><i class="ion-android-open"></i
                                    ></a>
                                  </li>
                                  <li>
                                    <a href="product-details.html"
                                      ><i class="ion-clipboard"></i
                                    ></a>
                                  </li>
                                </ul>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="shop_single_prduct_item">
                        <div class="single__product">
                          <div class="single_product__inner">
                            <span class="new_badge">new</span>
                            <div class="product_img">
                              <a href="#">
                                <img src="assets/img/product/7.jpg" alt="" />
                              </a>
                            </div>
                            <div class="product__content text-center">
                              <div class="produc_desc_info">
                                <div class="product_title">
                                  <h4>
                                    <a href="product-details.html"
                                      >Donec sem tellus</a
                                    >
                                  </h4>
                                </div>
                                <div class="product_price">
                                  <p>$45.66</p>
                                </div>
                              </div>
                              <div class="product__hover">
                                <ul>
                                  <li>
                                    <a href="#"
                                      ><i class="ion-android-cart"></i
                                    ></a>
                                  </li>
                                  <li>
                                    <a
                                      class="cart-fore"
                                      href="#"
                                      data-toggle="modal"
                                      data-target="#my_modal"
                                      title="Quick View"
                                      ><i class="ion-android-open"></i
                                    ></a>
                                  </li>
                                  <li>
                                    <a href="product-details.html"
                                      ><i class="ion-clipboard"></i
                                    ></a>
                                  </li>
                                </ul>
                              </div>
                            </div>
                          </div>
                        </div>
  
                        <div class="single__product">
                          <div class="single_product__inner">
                            <span class="new_badge">new</span>
                            <div class="product_img">
                              <a href="#">
                                <img src="assets/img/product/8.jpg" alt="" />
                              </a>
                            </div>
                            <div class="product__content text-center">
                              <div class="produc_desc_info">
                                <div class="product_title">
                                  <h4><a href="#">Country Burger</a></h4>
                                </div>
                                <div class="product_price">
                                  <p>$35.66</p>
                                </div>
                              </div>
                              <div class="product__hover">
                                <ul>
                                  <li>
                                    <a href="#"
                                      ><i class="ion-android-cart"></i
                                    ></a>
                                  </li>
                                  <li>
                                    <a
                                      class="cart-fore"
                                      href="#"
                                      data-toggle="modal"
                                      data-target="#my_modal"
                                      title="Quick View"
                                      ><i class="ion-android-open"></i
                                    ></a>
                                  </li>
                                  <li>
                                    <a href="product-details.html"
                                      ><i class="ion-clipboard"></i
                                    ></a>
                                  </li>
                                </ul>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="shop_single_prduct_item">
                        <div class="single__product">
                          <div class="single_product__inner">
                            <span class="new_badge">new</span>
                            <div class="product_img">
                              <a href="#">
                                <img src="assets/img/product/9.jpg" alt="" />
                              </a>
                            </div>
                            <div class="product__content text-center">
                              <div class="produc_desc_info">
                                <div class="product_title">
                                  <h4>
                                    <a href="product-details.html"
                                      >Chaz Kangeroo Hoodie3</a
                                    >
                                  </h4>
                                </div>
                                <div class="product_price">
                                  <p>$75.66</p>
                                </div>
                              </div>
                              <div class="product__hover">
                                <ul>
                                  <li>
                                    <a href="#"
                                      ><i class="ion-android-cart"></i
                                    ></a>
                                  </li>
                                  <li>
                                    <a
                                      class="cart-fore"
                                      href="#"
                                      data-toggle="modal"
                                      data-target="#my_modal"
                                      title="Quick View"
                                      ><i class="ion-android-open"></i
                                    ></a>
                                  </li>
                                  <li>
                                    <a href="product-details.html"
                                      ><i class="ion-clipboard"></i
                                    ></a>
                                  </li>
                                </ul>
                              </div>
                            </div>
                          </div>
                        </div>
  
                        <div class="single__product">
                          <div class="single_product__inner">
                            <span class="new_badge">new</span>
                            <div class="product_img">
                              <a href="#">
                                <img src="assets/img/product/10.jpg" alt="" />
                              </a>
                            </div>
                            <div class="product__content text-center">
                              <div class="produc_desc_info">
                                <div class="product_title">
                                  <h4>
                                    <a href="product-details.html"
                                      >Chaz Kangeroo Hoodie3</a
                                    >
                                  </h4>
                                </div>
                                <div class="product_price">
                                  <p>$75.66</p>
                                </div>
                              </div>
                              <div class="product__hover">
                                <ul>
                                  <li>
                                    <a href="#"
                                      ><i class="ion-android-cart"></i
                                    ></a>
                                  </li>
                                  <li>
                                    <a
                                      class="cart-fore"
                                      href="#"
                                      data-toggle="modal"
                                      data-target="#my_modal"
                                      title="Quick View"
                                      ><i class="ion-android-open"></i
                                    ></a>
                                  </li>
                                  <li>
                                    <a href="product-details.html"
                                      ><i class="ion-clipboard"></i
                                    ></a>
                                  </li>
                                </ul>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="shop_single_prduct_item">
                        <div class="single__product">
                          <div class="single_product__inner">
                            <span class="new_badge">new</span>
                            <div class="product_img">
                              <a href="#">
                                <img src="assets/img/product/11.jpg" alt="" />
                              </a>
                            </div>
                            <div class="product__content text-center">
                              <div class="produc_desc_info">
                                <div class="product_title">
                                  <h4>
                                    <a href="product-details.html"
                                      >Donec sem tellus</a
                                    >
                                  </h4>
                                </div>
                                <div class="product_price">
                                  <p>$45.66</p>
                                </div>
                              </div>
                              <div class="product__hover">
                                <ul>
                                  <li>
                                    <a href="#"
                                      ><i class="ion-android-cart"></i
                                    ></a>
                                  </li>
                                  <li>
                                    <a
                                      class="cart-fore"
                                      href="#"
                                      data-toggle="modal"
                                      data-target="#my_modal"
                                      title="Quick View"
                                      ><i class="ion-android-open"></i
                                    ></a>
                                  </li>
                                  <li>
                                    <a href="product-details.html"
                                      ><i class="ion-clipboard"></i
                                    ></a>
                                  </li>
                                </ul>
                              </div>
                            </div>
                          </div>
                        </div>
  
                        <div class="single__product">
                          <div class="single_product__inner">
                            <span class="new_badge">new</span>
                            <div class="product_img">
                              <a href="#">
                                <img src="assets/img/product/12.jpg" alt="" />
                              </a>
                            </div>
                            <div class="product__content text-center">
                              <div class="produc_desc_info">
                                <div class="product_title">
                                  <h4><a href="#">Country Burger</a></h4>
                                </div>
                                <div class="product_price">
                                  <p>$35.66</p>
                                </div>
                              </div>
                              <div class="product__hover">
                                <ul>
                                  <li>
                                    <a href="#"
                                      ><i class="ion-android-cart"></i
                                    ></a>
                                  </li>
                                  <li>
                                    <a
                                      class="cart-fore"
                                      href="#"
                                      data-toggle="modal"
                                      data-target="#my_modal"
                                      title="Quick View"
                                      ><i class="ion-android-open"></i
                                    ></a>
                                  </li>
                                  <li>
                                    <a href="product-details.html"
                                      ><i class="ion-clipboard"></i
                                    ></a>
                                  </li>
                                </ul>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="shop_single_prduct_item">
                        <div class="single__product">
                          <div class="single_product__inner">
                            <span class="new_badge">new</span>
                            <div class="product_img">
                              <a href="#">
                                <img src="assets/img/product/13.jpg" alt="" />
                              </a>
                            </div>
                            <div class="product__content text-center">
                              <div class="produc_desc_info">
                                <div class="product_title">
                                  <h4>
                                    <a href="product-details.html"
                                      >Chaz Kangeroo Hoodie3</a
                                    >
                                  </h4>
                                </div>
                                <div class="product_price">
                                  <p>$62.66</p>
                                </div>
                              </div>
                              <div class="product__hover">
                                <ul>
                                  <li>
                                    <a href="#"
                                      ><i class="ion-android-cart"></i
                                    ></a>
                                  </li>
                                  <li>
                                    <a
                                      class="cart-fore"
                                      href="#"
                                      data-toggle="modal"
                                      data-target="#my_modal"
                                      title="Quick View"
                                      ><i class="ion-android-open"></i
                                    ></a>
                                  </li>
                                  <li>
                                    <a href="product-details.html"
                                      ><i class="ion-clipboard"></i
                                    ></a>
                                  </li>
                                </ul>
                              </div>
                            </div>
                          </div>
                        </div>
  
                        <div class="single__product">
                          <div class="single_product__inner">
                            <span class="new_badge">new</span>
                            <div class="product_img">
                              <a href="#">
                                <img src="assets/img/product/8.jpg" alt="" />
                              </a>
                            </div>
                            <div class="product__content text-center">
                              <div class="produc_desc_info">
                                <div class="product_title">
                                  <h4>
                                    <a href="product-details.html"
                                      >Fusce nec facilisi</a
                                    >
                                  </h4>
                                </div>
                                <div class="product_price">
                                  <p>$68.66</p>
                                </div>
                              </div>
                              <div class="product__hover">
                                <ul>
                                  <li>
                                    <a href="#"
                                      ><i class="ion-android-cart"></i
                                    ></a>
                                  </li>
                                  <li>
                                    <a
                                      class="cart-fore"
                                      href="#"
                                      data-toggle="modal"
                                      data-target="#my_modal"
                                      title="Quick View"
                                      ><i class="ion-android-open"></i
                                    ></a>
                                  </li>
                                  <li>
                                    <a href="product-details.html"
                                      ><i class="ion-clipboard"></i
                                    ></a>
                                  </li>
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
              <div class="tab-pane fade" id="organics" role="tabpanel">
                <div class="row">
                  <div class="shop-product_list owl-carousel">
                    <div class="col-12">
                      <div class="shop_single_prduct_item">
                        <div class="single__product">
                          <div class="single_product__inner">
                            <span class="new_badge">new</span>
                            <div class="product_img">
                              <a href="#">
                                <img src="assets/img/product/1.jpg" alt="" />
                              </a>
                            </div>
                            <div class="product__content text-center">
                              <div class="produc_desc_info">
                                <div class="product_title">
                                  <h4>
                                    <a href="product-details.html"
                                      >Healthy Melt</a
                                    >
                                  </h4>
                                </div>
                                <div class="product_price">
                                  <p>$90.66</p>
                                </div>
                              </div>
  
                              <div class="product__hover">
                                <ul>
                                  <li>
                                    <a href="#"
                                      ><i class="ion-android-cart"></i
                                    ></a>
                                  </li>
                                  <li>
                                    <a
                                      class="cart-fore"
                                      href="#"
                                      data-toggle="modal"
                                      data-target="#my_modal"
                                      title="Quick View"
                                      ><i class="ion-android-open"></i
                                    ></a>
                                  </li>
                                  <li>
                                    <a href="product-details.html"
                                      ><i class="ion-clipboard"></i
                                    ></a>
                                  </li>
                                </ul>
                              </div>
                            </div>
                          </div>
                        </div>
  
                        <div class="single__product">
                          <div class="single_product__inner">
                            <span class="new_badge">new</span>
                            <div class="product_img">
                              <a href="#">
                                <img src="assets/img/product/2.jpg" alt="" />
                              </a>
                            </div>
                            <div class="product__content text-center">
                              <div class="produc_desc_info">
                                <div class="product_title">
                                  <h4>
                                    <a href="product-details.html"
                                      >Healthy Melt</a
                                    >
                                  </h4>
                                </div>
                                <div class="product_price">
                                  <p>$90.66</p>
                                </div>
                              </div>
  
                              <div class="product__hover">
                                <ul>
                                  <li>
                                    <a href="#"
                                      ><i class="ion-android-cart"></i
                                    ></a>
                                  </li>
                                  <li>
                                    <a
                                      class="cart-fore"
                                      href="#"
                                      data-toggle="modal"
                                      data-target="#my_modal"
                                      title="Quick View"
                                      ><i class="ion-android-open"></i
                                    ></a>
                                  </li>
                                  <li>
                                    <a href="product-details.html"
                                      ><i class="ion-clipboard"></i
                                    ></a>
                                  </li>
                                </ul>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="shop_single_prduct_item">
                        <div class="single__product">
                          <div class="single_product__inner">
                            <span class="new_badge">new</span>
                            <div class="product_img">
                              <a href="#">
                                <img src="assets/img/product/11.jpg" alt="" />
                              </a>
                            </div>
                            <div class="product__content text-center">
                              <div class="produc_desc_info">
                                <div class="product_title">
                                  <h4>
                                    <a href="product-details.html"
                                      >Fusce nec facilisi</a
                                    >
                                  </h4>
                                </div>
                                <div class="product_price">
                                  <p>$50.66</p>
                                </div>
                              </div>
                              <div class="product__hover">
                                <ul>
                                  <li>
                                    <a href="#"
                                      ><i class="ion-android-cart"></i
                                    ></a>
                                  </li>
                                  <li>
                                    <a
                                      class="cart-fore"
                                      href="#"
                                      data-toggle="modal"
                                      data-target="#my_modal"
                                      title="Quick View"
                                      ><i class="ion-android-open"></i
                                    ></a>
                                  </li>
                                  <li>
                                    <a href="product-details.html"
                                      ><i class="ion-clipboard"></i
                                    ></a>
                                  </li>
                                </ul>
                              </div>
                            </div>
                          </div>
                        </div>
  
                        <div class="single__product">
                          <div class="single_product__inner">
                            <span class="new_badge">new</span>
                            <div class="product_img">
                              <a href="#">
                                <img src="assets/img/product/12.jpg" alt="" />
                              </a>
                            </div>
                            <div class="product__content text-center">
                              <div class="produc_desc_info">
                                <div class="product_title">
                                  <h4><a href="#">Double Cheese</a></h4>
                                </div>
                                <div class="product_price">
                                  <p>$55.66</p>
                                </div>
                              </div>
                              <div class="product__hover">
                                <ul>
                                  <li>
                                    <a href="#"
                                      ><i class="ion-android-cart"></i
                                    ></a>
                                  </li>
                                  <li>
                                    <a
                                      class="cart-fore"
                                      href="#"
                                      data-toggle="modal"
                                      data-target="#my_modal"
                                      title="Quick View"
                                      ><i class="ion-android-open"></i
                                    ></a>
                                  </li>
                                  <li>
                                    <a href="product-details.html"
                                      ><i class="ion-clipboard"></i
                                    ></a>
                                  </li>
                                </ul>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="shop_single_prduct_item">
                        <div class="single__product">
                          <div class="single_product__inner">
                            <span class="new_badge">new</span>
                            <div class="product_img">
                              <a href="#">
                                <img src="assets/img/product/5.jpg" alt="" />
                              </a>
                            </div>
                            <div class="product__content text-center">
                              <div class="produc_desc_info">
                                <div class="product_title">
                                  <h4>
                                    <a href="product-details.html"
                                      >Sprite Yoga Straps1</a
                                    >
                                  </h4>
                                </div>
                                <div class="product_price">
                                  <p>$70.66</p>
                                </div>
                              </div>
                              <div class="product__hover">
                                <ul>
                                  <li>
                                    <a href="#"
                                      ><i class="ion-android-cart"></i
                                    ></a>
                                  </li>
                                  <li>
                                    <a
                                      class="cart-fore"
                                      href="#"
                                      data-toggle="modal"
                                      data-target="#my_modal"
                                      title="Quick View"
                                      ><i class="ion-android-open"></i
                                    ></a>
                                  </li>
                                  <li>
                                    <a href="product-details.html"
                                      ><i class="ion-clipboard"></i
                                    ></a>
                                  </li>
                                </ul>
                              </div>
                            </div>
                          </div>
                        </div>
  
                        <div class="single__product">
                          <div class="single_product__inner">
                            <span class="new_badge">new</span>
                            <div class="product_img">
                              <a href="#">
                                <img src="assets/img/product/6.jpg" alt="" />
                              </a>
                            </div>
                            <div class="product__content text-center">
                              <div class="produc_desc_info">
                                <div class="product_title">
                                  <h4>
                                    <a href="product-details.html"
                                      >Wayfarer Messenger Bag</a
                                    >
                                  </h4>
                                </div>
                                <div class="product_price">
                                  <p>$55.66</p>
                                </div>
                              </div>
                              <div class="product__hover">
                                <ul>
                                  <li>
                                    <a href="#"
                                      ><i class="ion-android-cart"></i
                                    ></a>
                                  </li>
                                  <li>
                                    <a
                                      class="cart-fore"
                                      href="#"
                                      data-toggle="modal"
                                      data-target="#my_modal"
                                      title="Quick View"
                                      ><i class="ion-android-open"></i
                                    ></a>
                                  </li>
                                  <li>
                                    <a href="product-details.html"
                                      ><i class="ion-clipboard"></i
                                    ></a>
                                  </li>
                                </ul>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="shop_single_prduct_item">
                        <div class="single__product">
                          <div class="single_product__inner">
                            <span class="new_badge">new</span>
                            <div class="product_img">
                              <a href="#">
                                <img src="assets/img/product/7.jpg" alt="" />
                              </a>
                            </div>
                            <div class="product__content text-center">
                              <div class="produc_desc_info">
                                <div class="product_title">
                                  <h4>
                                    <a href="product-details.html"
                                      >Donec sem tellus</a
                                    >
                                  </h4>
                                </div>
                                <div class="product_price">
                                  <p>$45.66</p>
                                </div>
                              </div>
                              <div class="product__hover">
                                <ul>
                                  <li>
                                    <a href="#"
                                      ><i class="ion-android-cart"></i
                                    ></a>
                                  </li>
                                  <li>
                                    <a
                                      class="cart-fore"
                                      href="#"
                                      data-toggle="modal"
                                      data-target="#my_modal"
                                      title="Quick View"
                                      ><i class="ion-android-open"></i
                                    ></a>
                                  </li>
                                  <li>
                                    <a href="product-details.html"
                                      ><i class="ion-clipboard"></i
                                    ></a>
                                  </li>
                                </ul>
                              </div>
                            </div>
                          </div>
                        </div>
  
                        <div class="single__product">
                          <div class="single_product__inner">
                            <span class="new_badge">new</span>
                            <div class="product_img">
                              <a href="#">
                                <img src="assets/img/product/8.jpg" alt="" />
                              </a>
                            </div>
                            <div class="product__content text-center">
                              <div class="produc_desc_info">
                                <div class="product_title">
                                  <h4><a href="#">Country Burger</a></h4>
                                </div>
                                <div class="product_price">
                                  <p>$35.66</p>
                                </div>
                              </div>
                              <div class="product__hover">
                                <ul>
                                  <li>
                                    <a href="#"
                                      ><i class="ion-android-cart"></i
                                    ></a>
                                  </li>
                                  <li>
                                    <a
                                      class="cart-fore"
                                      href="#"
                                      data-toggle="modal"
                                      data-target="#my_modal"
                                      title="Quick View"
                                      ><i class="ion-android-open"></i
                                    ></a>
                                  </li>
                                  <li>
                                    <a href="product-details.html"
                                      ><i class="ion-clipboard"></i
                                    ></a>
                                  </li>
                                </ul>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="shop_single_prduct_item">
                        <div class="single__product">
                          <div class="single_product__inner">
                            <span class="new_badge">new</span>
                            <div class="product_img">
                              <a href="#">
                                <img src="assets/img/product/9.jpg" alt="" />
                              </a>
                            </div>
                            <div class="product__content text-center">
                              <div class="produc_desc_info">
                                <div class="product_title">
                                  <h4>
                                    <a href="product-details.html"
                                      >Chaz Kangeroo Hoodie3</a
                                    >
                                  </h4>
                                </div>
                                <div class="product_price">
                                  <p>$75.66</p>
                                </div>
                              </div>
                              <div class="product__hover">
                                <ul>
                                  <li>
                                    <a href="#"
                                      ><i class="ion-android-cart"></i
                                    ></a>
                                  </li>
                                  <li>
                                    <a
                                      class="cart-fore"
                                      href="#"
                                      data-toggle="modal"
                                      data-target="#my_modal"
                                      title="Quick View"
                                      ><i class="ion-android-open"></i
                                    ></a>
                                  </li>
                                  <li>
                                    <a href="product-details.html"
                                      ><i class="ion-clipboard"></i
                                    ></a>
                                  </li>
                                </ul>
                              </div>
                            </div>
                          </div>
                        </div>
  
                        <div class="single__product">
                          <div class="single_product__inner">
                            <span class="new_badge">new</span>
                            <div class="product_img">
                              <a href="#">
                                <img src="assets/img/product/10.jpg" alt="" />
                              </a>
                            </div>
                            <div class="product__content text-center">
                              <div class="produc_desc_info">
                                <div class="product_title">
                                  <h4>
                                    <a href="product-details.html"
                                      >Chaz Kangeroo Hoodie3</a
                                    >
                                  </h4>
                                </div>
                                <div class="product_price">
                                  <p>$75.66</p>
                                </div>
                              </div>
                              <div class="product__hover">
                                <ul>
                                  <li>
                                    <a href="#"
                                      ><i class="ion-android-cart"></i
                                    ></a>
                                  </li>
                                  <li>
                                    <a
                                      class="cart-fore"
                                      href="#"
                                      data-toggle="modal"
                                      data-target="#my_modal"
                                      title="Quick View"
                                      ><i class="ion-android-open"></i
                                    ></a>
                                  </li>
                                  <li>
                                    <a href="product-details.html"
                                      ><i class="ion-clipboard"></i
                                    ></a>
                                  </li>
                                </ul>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="shop_single_prduct_item">
                        <div class="single__product">
                          <div class="single_product__inner">
                            <span class="new_badge">new</span>
                            <div class="product_img">
                              <a href="#">
                                <img src="assets/img/product/11.jpg" alt="" />
                              </a>
                            </div>
                            <div class="product__content text-center">
                              <div class="produc_desc_info">
                                <div class="product_title">
                                  <h4>
                                    <a href="product-details.html"
                                      >Donec sem tellus</a
                                    >
                                  </h4>
                                </div>
                                <div class="product_price">
                                  <p>$45.66</p>
                                </div>
                              </div>
                              <div class="product__hover">
                                <ul>
                                  <li>
                                    <a href="#"
                                      ><i class="ion-android-cart"></i
                                    ></a>
                                  </li>
                                  <li>
                                    <a
                                      class="cart-fore"
                                      href="#"
                                      data-toggle="modal"
                                      data-target="#my_modal"
                                      title="Quick View"
                                      ><i class="ion-android-open"></i
                                    ></a>
                                  </li>
                                  <li>
                                    <a href="product-details.html"
                                      ><i class="ion-clipboard"></i
                                    ></a>
                                  </li>
                                </ul>
                              </div>
                            </div>
                          </div>
                        </div>
  
                        <div class="single__product">
                          <div class="single_product__inner">
                            <span class="new_badge">new</span>
                            <div class="product_img">
                              <a href="#">
                                <img src="assets/img/product/12.jpg" alt="" />
                              </a>
                            </div>
                            <div class="product__content text-center">
                              <div class="produc_desc_info">
                                <div class="product_title">
                                  <h4><a href="#">Country Burger</a></h4>
                                </div>
                                <div class="product_price">
                                  <p>$35.66</p>
                                </div>
                              </div>
                              <div class="product__hover">
                                <ul>
                                  <li>
                                    <a href="#"
                                      ><i class="ion-android-cart"></i
                                    ></a>
                                  </li>
                                  <li>
                                    <a
                                      class="cart-fore"
                                      href="#"
                                      data-toggle="modal"
                                      data-target="#my_modal"
                                      title="Quick View"
                                      ><i class="ion-android-open"></i
                                    ></a>
                                  </li>
                                  <li>
                                    <a href="product-details.html"
                                      ><i class="ion-clipboard"></i
                                    ></a>
                                  </li>
                                </ul>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="shop_single_prduct_item">
                        <div class="single__product">
                          <div class="single_product__inner">
                            <span class="new_badge">new</span>
                            <div class="product_img">
                              <a href="#">
                                <img src="assets/img/product/13.jpg" alt="" />
                              </a>
                            </div>
                            <div class="product__content text-center">
                              <div class="produc_desc_info">
                                <div class="product_title">
                                  <h4>
                                    <a href="product-details.html"
                                      >Chaz Kangeroo Hoodie3</a
                                    >
                                  </h4>
                                </div>
                                <div class="product_price">
                                  <p>$62.66</p>
                                </div>
                              </div>
                              <div class="product__hover">
                                <ul>
                                  <li>
                                    <a href="#"
                                      ><i class="ion-android-cart"></i
                                    ></a>
                                  </li>
                                  <li>
                                    <a
                                      class="cart-fore"
                                      href="#"
                                      data-toggle="modal"
                                      data-target="#my_modal"
                                      title="Quick View"
                                      ><i class="ion-android-open"></i
                                    ></a>
                                  </li>
                                  <li>
                                    <a href="product-details.html"
                                      ><i class="ion-clipboard"></i
                                    ></a>
                                  </li>
                                </ul>
                              </div>
                            </div>
                          </div>
                        </div>
  
                        <div class="single__product">
                          <div class="single_product__inner">
                            <span class="new_badge">new</span>
                            <div class="product_img">
                              <a href="#">
                                <img src="assets/img/product/8.jpg" alt="" />
                              </a>
                            </div>
                            <div class="product__content text-center">
                              <div class="produc_desc_info">
                                <div class="product_title">
                                  <h4>
                                    <a href="product-details.html"
                                      >Fusce nec facilisi</a
                                    >
                                  </h4>
                                </div>
                                <div class="product_price">
                                  <p>$68.66</p>
                                </div>
                              </div>
                              <div class="product__hover">
                                <ul>
                                  <li>
                                    <a href="#"
                                      ><i class="ion-android-cart"></i
                                    ></a>
                                  </li>
                                  <li>
                                    <a
                                      class="cart-fore"
                                      href="#"
                                      data-toggle="modal"
                                      data-target="#my_modal"
                                      title="Quick View"
                                      ><i class="ion-android-open"></i
                                    ></a>
                                  </li>
                                  <li>
                                    <a href="product-details.html"
                                      ><i class="ion-clipboard"></i
                                    ></a>
                                  </li>
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
            </div>
          </div>
        </div>
      </div>
    </div> --}}
        <!--shop product area end-->

        <!--Banner area start-->
        <div class="banner_area home1_banner2 pb-90">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="single_banner">
                            <a href="#">
                                <img src="assets/img/banner/big-1.jpg" alt="" />
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="single_banner">
                            <a href="#">
                                <img src="assets/img/banner/big-2.jpg" alt="" />
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Banner area end-->

        <!--Recommended product area start-->
        <div class="recommended_product">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="shop_product_head d-flex justify-content-between mb-30">
                            <div class="section_title space_2 text-left">
                                <h3>Sản phẩm khuyến mãi</h3>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-content">
                    <div class="tab-pane active show fade" id="fresh_fruit" role="tabpanel">
                        <div class="row">
                            <div class="features_product_active owl-carousel">
                                @foreach ($discountProducts as $product)
                                    <div class="col-lg-2">
                                        <div class="single__product">
                                            <div class="single_product__inner">
                                                <span class="discount_price">Khuyến mãi</span>
                                                <div class="product_img">
                                                    <a href="shop/san-pham/{{ $product->alias }}">
                                                        <img src="front/img/{{ $product->productImage[0]->path }}"
                                                            alt="" />
                                                    </a>
                                                </div>
                                                <div class="product__content text-center">
                                                    <div class="produc_desc_info">
                                                        <div class="product_title">
                                                            <h4>
                                                                <a
                                                                    href="shop/san-pham/{{ $product->alias }}">{{ $product->product_name }}</a>
                                                            </h4>
                                                        </div>
                                                        <div class="product_price">
                                                            <p>{{ number_format($product->discount, 0) }}<small>đ</small><strike
                                                                    style="margin-left: 10px;font-size: 14px;color: darkgray;font-weight: 500">{{ number_format($product->price, 0) }}đ</strike>
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="product__hover">
                                                        <ul>
                                                            <li>
                                                                <a href="javascript:addCart({{ $product->id }},1)"><i
                                                                        class="ion-android-cart"></i></a>
                                                            </li>
                                                            <li>
                                                                <a href="shop/san-pham/{{ $product->alias }}"><i
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
            </div>
        </div>
        <!--Recommended product area end-->

        <!--New product area-->
        <div class="new_product">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="section_title space_2 text-left">
                            <h3>Sản phẩm mới</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="features_product_active owl-carousel">
                        @foreach ($newProduct as $product)
                            <div class="col-lg-2">
                                <div class="single__product">
                                    <div class="single_product__inner">
                                        {{-- <span class="new_badge">new</span> --}}
                                        @if ($product->discount != null)
                                            <span class="discount_price">Khuyến mãi</span>
                                        @endif
                                        <div class="product_img">
                                            <a href="shop/san-pham/{{ $product->alias }}">
                                                <img src="front/img/{{ $product->productImage[0]->path }}"
                                                    style="height: 223px" />
                                            </a>
                                        </div>
                                        <div class="product__content text-center">
                                            <div class="produc_desc_info">
                                                <div class="product_title">
                                                    <h4>
                                                        <a
                                                            href="shop/san-pham/{{ $product->alias }}">{{ $product->product_name }}</a>
                                                    </h4>
                                                </div>
                                                <div class="product_price">
                                                    @if ($product->discount != null)
                                                        <p>{{ number_format($product->discount, 0) }}<small>đ</small><strike
                                                                style="margin-left: 10px;font-size: 14px;color: darkgray;font-weight: 500">{{ number_format($product->price, 0) }}đ</strike>
                                                        </p>
                                                    @else
                                                        <p>{{ number_format($product->price, 0) }}<small>đ</small></p>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="product__hover">
                                                <ul>
                                                    <li>
                                                        <a href="javascript:addCart({{ $product->id }},1)"><i
                                                                class="ion-android-cart"></i></a>
                                                    </li>
                                                    <li>
                                                        <a href="shop/san-pham/{{ $product->alias }}"><i
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
        <!--new product end-->

        <!--Banner area start-->
        <div class="banner_area banner_area-2 pb-90">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-md-4">
                        <div class="single_banner">
                            <a href="#">
                                <img src="assets/img/banner/banner-4.jpg" alt="" />
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-4">
                        <div class="single_banner">
                            <a href="#">
                                <img src="assets/img/banner/banner-5.jpg" alt="" />
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4">
                        <div class="single_banner">
                            <a href="#">
                                <img src="assets/img/banner/banner-6.jpg" alt="" />
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Banner area end-->

        <!--Best seller product -->
        <div class="best_seller_product">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="section_title space_2 text-left">
                            <h3>Sản phẩm ngẫu nhiên</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="features_product_active owl-carousel">
                        @foreach ($randomProduct as $product)
                            <div class="col-lg-2">
                                <div class="single__product">
                                    <div class="single_product__inner">
                                        {{-- <span class="new_badge">new</span> --}}
                                        @if ($product->discount != null)
                                            <span class="discount_price">Khuyến mãi</span>
                                        @endif
                                        <div class="product_img">
                                            <a href="shop/san-pham/{{ $product->alias }}">
                                                <img src="front/img/{{ $product->productImage[0]->path }}"
                                                    style="height: 223px" />
                                            </a>
                                        </div>
                                        <div class="product__content text-center">
                                            <div class="produc_desc_info">
                                                <div class="product_title">
                                                    <h4>
                                                        <a
                                                            href="shop/san-pham/{{ $product->alias }}">{{ $product->product_name }}</a>
                                                    </h4>
                                                </div>
                                                <div class="product_price">
                                                    @if ($product->discount != null)
                                                        <p>{{ number_format($product->discount, 0) }}<small>đ</small><strike
                                                                style="margin-left: 10px;font-size: 14px;color: darkgray;font-weight: 500">{{ number_format($product->price, 0) }}đ</strike>
                                                        </p>
                                                    @else
                                                        <p>{{ number_format($product->price, 0) }}<small>đ</small></p>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="product__hover">
                                                <ul>
                                                    <li>
                                                        <a href="javascript:addCart({{ $product->id }},1)"><i
                                                                class="ion-android-cart"></i></a>
                                                    </li>
                                                    <li>
                                                        <a href="shop/san-pham/{{ $product->alias }}"><i
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
        <!--Best seller product  end-->

        <!-- footer start -->
        <footer class="footer pt-90">
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

    <!-- modal area start -->
    <div class="modal fade" id="my_modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="modal-body shop">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-5 col-md-5 col-sm-12">
                                <div class="product-flags madal">
                                    <div class="tab-content" id="pills-tabContent">
                                        <div class="tab-pane fade show active" id="imgeone" role="tabpanel">
                                            <div class="product_tab_img">
                                                <a href="#"><img src="assets/img/cart/nav12.jpg"
                                                        alt="" /></a>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="imgetwo" role="tabpanel">
                                            <div class="product_tab_img">
                                                <a href="#"><img src="assets/img/cart/nav11.jpg"
                                                        alt="" /></a>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="imgethree" role="tabpanel">
                                            <div class="product_tab_img">
                                                <a href="#"><img src="assets/img/cart/nav13.jpg"
                                                        alt="" /></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="products_tab_button modals">
                                        <ul class="nav product_navactive" role="tablist">
                                            <li>
                                                <a class="nav-link active" data-toggle="tab" href="#imgeone"
                                                    role="tab" aria-controls="imgeone" aria-selected="false"><img
                                                        src="assets/img/cart/nav.jpg" alt="" /></a>
                                            </li>
                                            <li>
                                                <a class="nav-link" data-toggle="tab" href="#imgetwo" role="tab"
                                                    aria-controls="imgetwo" aria-selected="false"><img
                                                        src="assets/img/cart/nav1.jpg" alt="" /></a>
                                            </li>
                                            <li>
                                                <a class="nav-link button_three" data-toggle="tab" href="#imgethree"
                                                    role="tab" aria-controls="imgethree" aria-selected="false"><img
                                                        src="assets/img/cart/nav2.jpg" alt="" /></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-7 col-md-7 col-sm-12">
                                <div class="modal_right">
                                    <div class="shop_reviews">
                                        <div class="demo_product">
                                            <h2>Sprite Yoga Straps1</h2>
                                        </div>
                                        <div class="current_price">
                                            <span class="regular">$64.99</span>
                                            <span class="regular_price">$78.99</span>
                                        </div>
                                        <div class="product_information product_modal">
                                            <div id="product_modal_content">
                                                <p>
                                                    Short-sleeved blouse with feminine draped sleeve
                                                    detail.
                                                </p>
                                            </div>
                                            <div class="product_variants">
                                                <div class="product_variants_item modal_item">
                                                    <span class="control_label">Size</span>
                                                    <select id="group_1">
                                                        <option value="1">S</option>
                                                        <option value="2" selected="selected">M</option>
                                                        <option value="3">L</option>
                                                    </select>
                                                </div>

                                                <div class="quickview_plus_minus">
                                                    <span class="control_label">Quantity</span>
                                                    <div class="quickview_plus_minus_inner">
                                                        <div class="cart-plus-minus">
                                                            <input type="text" value="02" name="qtybutton"
                                                                class="cart-plus-minus-box" />
                                                        </div>
                                                        <div class="add_button add_modal">
                                                            <button type="submit">Add to cart</button>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="cart_description">
                                                    <p>
                                                        Lorem ipsum dolor sit amet, consectetur
                                                        adipisicing elit, sed do eiusmod tempor incididunt
                                                        ut labore et dolore magna aliqua. Ut enim ad minim
                                                        veniam,
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="social-share">
                                    <h3>Share this product</h3>
                                    <ul>
                                        <li>
                                            <a href="#"><i class="fa fa-facebook"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fa fa-twitter"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fa fa-pinterest"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fa fa-google-plus"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fa fa-linkedin"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- modal area end -->
    <script src="assets/js/vendor/jquery-1.12.0.min.js"></script>




@endsection
