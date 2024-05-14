<!DOCTYPE html>
<html class="no-js" lang="zxx">

    <head>
        <base href="{{ asset('/') }}">
        <meta charset="utf-8" />
        <meta http-equiv="x-ua-compatible" content="ie=edge" />
        <title>@yield('title') | LynShop</title>
        <meta name="description" content="" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <!-- all css here -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
        <link rel="stylesheet" href="assets/css/animate.css" />
        <link rel="stylesheet" href="assets/css/owl.carousel.min.css" />
        <link rel="stylesheet" href="assets/css/chosen.min.css" />
        <link rel="stylesheet" href="assets/css/ionicons.min.css" />
        <link rel="stylesheet" href="assets/css/font-awesome.min.css" />
        <link rel="stylesheet" href="assets/css/material-design-iconic-font.min.css" />
        @yield('style')
        <link rel="stylesheet" href="assets/css/jquery-ui.css">
        <link rel="stylesheet" href="assets/css/meanmenu.min.css" />
        <link rel="stylesheet" href="assets/css/bundle.css" />
        <link rel="stylesheet" href="assets/css/style.css" />
        <link rel="stylesheet" href="assets/css/responsive.css" />
        <link rel="stylesheet" href="assets/css/shop.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">

        @yield('css')
        <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
    </head>

    <body>
        <!-- Add your site or application content here -->
        <div class="alert alert-success message" style="display: none">
            <span>Thêm sản phẩm vào giỏ hàng thành công</span>
        </div>
        <div class="alert alert-danger outofstock" style="display: none">
            <span>Sản phẩm này đã hết hàng hoặc không đủ hàng để đặt</span>
        </div>
        @yield('body')

        <!-- all js here -->
        <script src="assets/js/popper.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery-ui.js"></script>
        <script src="assets/js/jquery.meanmenu.min.js"></script>
        <script src="assets/js/isotope.pkgd.min.js"></script>
        <script src="assets/js/imagesloaded.pkgd.min.js"></script>
        <script src="assets/js/jquery.counterup.min.js"></script>
        <script src="assets/js/waypoints.min.js"></script>
        <script src="assets/js/ajax-mail.js"></script>
        <script src="assets/js/owl.carousel.min.js"></script>
        <script src="assets/js/plugins.js"></script>
        <script src="assets/js/main.js"></script>
        @yield('js')
    </body>

</html>
