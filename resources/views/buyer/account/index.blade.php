    @extends('buyer.layout.master')
    @section('title', 'Dashboard')
    @section('style')
        <link rel="stylesheet"
            href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="admin/plugins/fontawesome-free/css/all.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Tempusdominus Bootstrap 4 -->
        <link rel="stylesheet" href="admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
        <!-- iCheck -->
        <link rel="stylesheet" href="admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
        <!-- JQVMap -->
        <link rel="stylesheet" href="admin/plugins/jqvmap/jqvmap.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="admin/dist/css/adminlte.min.css">
        <!-- overlayScrollbars -->
        <link rel="stylesheet" href="admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
        <!-- Daterange picker -->
        <link rel="stylesheet" href="admin/plugins/daterangepicker/daterangepicker.css">
        <!-- summernote -->
        <link rel="stylesheet" href="admin/plugins/summernote/summernote-bs4.min.css">
    @endsection
    @section('body')
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                        <h3>Thông tin cá nhân </h3>
                        <div class="login">
                            <div class="login-form-container">
                                <div class="account-login-form">
                                    <form action="{{ route('updateProfile') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div style="margin-bottom: 20px">
                                            <label for="exampleInputFile">Hình ảnh</label>
                                            <img id="img1" src="assets/img/empty.jpg"
                                                style="width: 200px;margin-left: 10px;" />
                                            
                                                        <input type="file" name="image" onchange="document.getElementById('img1').src = window.URL.createObjectURL(this.files[0])">

                                        </div>
                                        <div style="margin-bottom: 20px">
                                        <label>Họ và tên</label>
                                        <input type="text" name="name" value="{{$shop->name }}" required style="width: 100%;">
                                        </div>
                                        <div style="margin-bottom: 20px">
                                            <label>Địa chỉ email</label>
                                            <input style="margin-bottom: 0px; width: 100%;" required type="email" name="email"
                                                value="{{ $shop->email }}" >
                                        </div>
                                        <div style="margin-bottom: 20px">
                                            <label>Số điện thoại</label>
                                            <input type="text" name="phone" required value="{{$shop->phone }}"
                                                style="margin-bottom: 0px; width: 100%;">
                                        </div>

                                        <div style="margin-bottom: 20px">
                                        <label>Thành phố</label>
                                        <input type="text" name="city" required value="{{  $shop->getCity->name }}" style="margin-bottom: 0px; width: 100%;">
                                        </div>
                                        <div style="margin-bottom: 20px">
                                        <label>Quận huyện</label>
                                        <input type="text" name="district" required value="{{  $shop->getDistrict->name }}" style="margin-bottom: 0px; width: 100%;">
                                        </div>
                                        <div style="margin-bottom: 20px">
                                        <label>Phường xã</label>
                                        <input type="text" name="ward" required value="{{  $shop->getWard->name }}" style="margin-bottom: 0px; width: 100%;">
                                        </div>
                                        <div style="margin-bottom: 20px">
                                        <label>Địa chỉ</label>
                                        <input type="text" name="address" value="{{ $shop->address }}" style="width: 100%;">
                                        </div>
                                        
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

    @section('script')
        <script src="admin/plugins/jquery/jquery.min.js"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="admin/plugins/jquery-ui/jquery-ui.min.js"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
            $.widget.bridge('uibutton', $.ui.button)
        </script>
        <!-- Bootstrap 4 -->
        <script src="admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- ChartJS -->
        <script src="admin/plugins/chart.js/Chart.min.js"></script>
        <!-- Sparkline -->
        <script src="admin/plugins/sparklines/sparkline.js"></script>
        <!-- JQVMap -->
        <script src="admin/plugins/jqvmap/jquery.vmap.min.js"></script>
        <script src="admin/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
        <!-- jQuery Knob Chart -->
        <script src="admin/plugins/jquery-knob/jquery.knob.min.js"></script>
        <!-- daterangepicker -->
        <script src="admin/plugins/moment/moment.min.js"></script>
        <script src="admin/plugins/daterangepicker/daterangepicker.js"></script>
        <!-- Tempusdominus Bootstrap 4 -->
        <script src="admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
        <!-- Summernote -->
        <script src="admin/plugins/summernote/summernote-bs4.min.js"></script>
        <!-- overlayScrollbars -->
        <script src="admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
        <!-- AdminLTE App -->
        <script src="admin/dist/js/adminlte.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="admin/dist/js/demo.js"></script>
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="admin/dist/js/pages/dashboard.js"></script>


    @endsection
@endsection
