@extends('admin.layout.master')
@section('title','Cập nhập đơn hàng')
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
                  <h3 class="card-title">Thông tin người nhận</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form>
                  <div class="card-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Họ và tên</label>
                      <input type="text" minlength="3" class="form-control" id="exampleInputEmail1" name="name" disabled value="{{ $order->user->name }}" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Email</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" disabled name="email" value="{{ $order->user->email }}" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Số điện thoại</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" disabled value="{{ $order->user->phone }}" name="phone" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Địa chỉ</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" disabled value="{{ $order->address }}" name="max_discount">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Phường xã</label>
                      <input type="text" minlength="1" class="form-control" id="exampleInputEmail1" disabled value="{{ $order->getWard->name }}" name="total_order" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Quận huyện</label>
                      <input type="text" minlength="3" class="form-control" id="exampleInputEmail1" disabled value="{{ $order->getDistrict->name }}" name="expire_date" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Thành phố</label>
                      <input type="text" min="0" class="form-control" id="exampleInputEmail1" disabled value="{{ $order->getCity->name }}" name="quantity" required>
                    </div>
                  </div>
                  <!-- /.card-body -->
                </form>
            </div>

            <div class="card card-primary">
              <div class="card-header">

                <h3 class="card-title">Thông tin đơn hàng</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="admin/edit-order/{{ $order->id }}" method="POST">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Mã đơn hàng</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="name" disabled value="{{ $order->order_code }}" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Thời gian đặt hàng</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="code" disabled value="{{ date('H:m:i, d/m/Y', strtotime($order->order_date)) }}" required>
                  </div>
                  {{-- <div class="form-group">
                    <label for="exampleInputEmail1">Loại mã</label>
                    <select required name="type" class="custom-select">
                        <option {{ $coupon->type == 1 ? 'selected' : '' }} value="1">Giảm theo phần trăm</option>
                        <option {{ $coupon->type == 2 ? 'selected' : '' }} value="2">Giảm theo giá tiền</option>
                    </select>
                  </div> --}}
                  <div class="form-group">
                    <label for="exampleInputEmail1">Thanh toán</label>
                    <input type="text" minlength="1" class="form-control {{ $order->paid == 1 ? "" : 'is-invalid' }}" id="exampleInputEmail1" disabled value="{{ $order->paid == 1 ? "Đã thanh toán" : "Chưa thanh toán" }}" name="value" required>
                  </div>
                  @if($order->paid == 1)
                  <div class="form-group">
                    <label for="exampleInputEmail1">Thời gian thanh toán</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="name" disabled value="{{ date('H:m:i, d/m/Y', strtotime($order->pay_date)) }}" required>
                  </div>
                  @endif
                  <div class="form-group">
                    <label for="exampleInputEmail1">Phương thức thanh toán</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" disabled value="{{ $order->payment_id == 1 ? "Thanh toán COD" : "Thanh toán Online" }}" name="max_discount">
                  </div>
                  @if($order->note != null)
                  <div class="form-group">
                    <label for="exampleInputEmail1">Ghi chú</label>
                    <textarea class="form-control" id="exampleInputEmail1" name="name" disabled required>{{ $order->note }}</textarea>
                  </div>
                  @endif
                </div>

              </form>
            </div>

            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Chi tiết đơn hàng</h3>
              </div>
              <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 100px">Ảnh</th>
                      <th>Tên sản phẩm</th>
                      <th>Đơn giá</th>
                      <th>Số lượng</th>
                      <th>Thành tiền</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($order->orderDetails as $orderDetail)
                    <tr>
                      <td><img style="width: 100px" src="front/img/{{ $orderDetail->product->productImage[0]->path }}" /></td>
                      <td>{{  $orderDetail->product->product_name }}</td>
                      <td><b>{{  number_format( $orderDetail->product->price,0) }}đ</b></td>
                      <td>
                        {{  $orderDetail->quantity }}
                      </td>
                      <td><span style="font-weight: bold">{{ number_format( $orderDetail->total,0) }}đ</span></td>
                    </tr>
                    @endforeach
                  </tbody>
                  <tfoot>
                      <tr>
                          <td colspan="4" style="text-align: right">Tổng tiền</td>
                          <td><span style="font-weight: bold">{{ number_format($order->subtotal,0) }}đ</span></td>
                      </tr>
                      <tr>
                          <td colspan="4" style="text-align: right">Khuyến mãi</td>
                          <td><span style="font-weight: bold">{{ number_format($order->discount,0) }}đ</span></td>
                      </tr>
                      <tr>
                          <td colspan="4" style="text-align: right">Tổng cộng</td>
                          <td><span style="font-weight: bold">{{ number_format($order->total,0) }}đ</span></td>
                      </tr>
                  </tfoot>
              </table>
            </div>
            @if($order->status != 'Chờ xác nhận')
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Thông tin người giao hàng</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              @if($order->status == 'Đã xác nhận')
              <form action="admin/edit-order/{{ $order->id }}" method="POST">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Chọn người giao hàng</label>
                    <select required name="shipper_id" class="custom-select">
                      @foreach($shippers as $shipper)
                        <option value="{{ $shipper->id }}">{{ $shipper->name }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Giao hàng</button>
                </div>
                <!-- /.card-body -->
              </form>
              @elseif($order->status == 'Đang giao hàng' || $order->status == 'Đã giao hàng')
              <form action="admin/edit-order/{{ $order->id }}" method="POST">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Họ và tên</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="name" disabled value="{{ $order->shipper->name }}" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Số điện thoại</label>
                    <input type="text"  class="form-control" id="exampleInputEmail1" name="name" disabled value="{{ $order->shipper->phone }}" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Địa chỉ</label>
                    <input type="text"  class="form-control" id="exampleInputEmail1" name="name" disabled value="{{ $order->shipper->address }}, {{ $order->shipper->getWard->name }}, {{ $order->shipper->getDistrict->name }}, {{ $order->shipper->getCity->name }}" required>
                  </div>
                </div>
                <!-- /.card-body -->
                @if($order->status == 'Đang giao hàng')
                <div class="card-footer">
                  <button type="submit" class="btn btn-success">Đã giao hàng</button>
                </div>
                @endif
              </form>
              @endif
            </div>
            @endif

            @if($order->status == 'Chờ xác nhận')
            <div class="card-footer">
              
              <form action="admin/edit-order/{{ $order->id }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-primary">Xác nhận đơn hàng</button>
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