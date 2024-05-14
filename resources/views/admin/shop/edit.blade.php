@extends('admin.layout.master')
@section('title', 'Cập nhập cửa hàng')
@section('style')
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="admin/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="admin/dist/css/adminlte.min.css">
@endsection
@section('body')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">

                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    @if (Session::has('success'))
                        <div class="col-md-12 alert alert-success">
                            <span>{{ Session::get('success') }}</span>
                        </div>
                    @endif
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Thông tin cửa hàng</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Tên cửa hàng</label>
                                        <input type="text" minlength="3" class="form-control" id="exampleInputEmail1"
                                            name="name" disabled value="{{ $shop->name }}" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" disabled
                                            name="email" value="{{ $shop->email }}" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Số điện thoại</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" disabled
                                            value="{{ $shop->phone }}" name="phone" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Địa chỉ</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" disabled
                                            value="{{ $shop->address }}" name="max_discount">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Phường xã</label>
                                        <input type="text" minlength="1" class="form-control" id="exampleInputEmail1"
                                            disabled value="{{ $shop->getWard->name }}" name="total_order" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Quận huyện</label>
                                        <input type="text" minlength="3" class="form-control" id="exampleInputEmail1"
                                            disabled value="{{ $shop->getDistrict->name }}" name="expire_date" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Thành phố</label>
                                        <input type="text" min="0" class="form-control" id="exampleInputEmail1"
                                            disabled value="{{ $shop->getCity->name }}" name="quantity" required>
                                    </div>
                                    <!-- /.card-body -->
                            </form>
                        </div>

                        @if ($shop->status == 'Chờ xác nhận')
                            <div class="card-footer">

                                <form action="admin/edit-shop/{{ $shop->id }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">Xác nhận cửa hàng</button>
                                </form>

                            </div>
                        @elseif($shop->status == 'Đã xác nhận')
                            <div class="card-footer">

                                <form action="admin/edit-shop/{{ $shop->id }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">Khoá cửa hàng</button>
                                </form>

                            </div>
                        @elseif($shop->status == 'Đã khoá')
                            <div class="card-footer">

                                <form action="admin/edit-shop/{{ $shop->id }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">Mở cửa hàng</button>
                                </form>

                            </div>
                        @endif
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>

@section('script')
    <!-- jQuery -->
    <script src="admin/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- bs-custom-file-input -->
    <script src="admin/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
    <!-- AdminLTE App -->
    <script src="admin/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="admin/dist/js/demo.js"></script>

    <!-- Page specific script -->
@endsection

@endsection
