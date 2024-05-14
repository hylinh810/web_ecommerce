@extends('admin.layout.master')
@section('title','Cập nhập coupon')
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
          @if(Session::has('success'))
            <div class="col-md-12 alert alert-success">
                <span>{{ Session::get('success') }}</span>
            </div>
          @endif
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">

                <h3 class="card-title">Cập nhập mã khuyến mãi</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="admin/edit-coupon/{{ $coupon->id }}" method="POST">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Tên mã khuyến mãi</label>
                    <input type="text" minlength="3" class="form-control" id="exampleInputEmail1" name="name" value="{{ $coupon->name }}" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Mã khuyến mãi</label>
                    <input type="text" minlength="10" maxlength="10" class="form-control" id="exampleInputEmail1" name="code" value="{{ $coupon->code }}" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Loại mã</label>
                    <select required name="type" class="custom-select">
                        <option {{ $coupon->type == 1 ? 'selected' : '' }} value="1">Giảm theo phần trăm</option>
                        <option {{ $coupon->type == 2 ? 'selected' : '' }} value="2">Giảm theo giá tiền</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Số tiền giảm hoặc phần trăm giảm</label>
                    <input type="number" minlength="1" class="form-control" id="exampleInputEmail1" value="{{ $coupon->value }}" name="value" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Giảm tối đa</label>
                    <input type="number" class="form-control" id="exampleInputEmail1" value="{{ $coupon->max_discount }}" name="max_discount">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Điều kiện đơn hàng trên bao nhiêu tiền</label>
                    <input type="number" minlength="1" class="form-control" id="exampleInputEmail1" value="{{ $coupon->total_order }}" name="total_order" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Ngày hết hạn</label>
                    <input type="date" minlength="3" class="form-control" id="exampleInputEmail1" value="{{ $coupon->expire_date }}" name="expire_date" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Số lượng</label>
                    <input type="number" min="0" class="form-control" id="exampleInputEmail1" value="{{ $coupon->quantity }}" name="quantity" required>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Cập nhập</button>
                </div>
              </form>
            </div>

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