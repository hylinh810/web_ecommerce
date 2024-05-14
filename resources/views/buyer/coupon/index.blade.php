@extends('buyer.layout.master')
@section('title','Danh sách Coupon')
@section('style')
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
<link rel="stylesheet" href="admin/plugins/fontawesome-free/css/all.min.css">
<!-- DataTables -->
<link rel="stylesheet" href="admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="admin/dist/css/adminlte.min.css">
@endsection
@section('body')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Danh sách mã khuyến mãi</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- /.card -->

            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Tên mã</th>
                    <th>Nội dung mã</th>
                    <th>Số lượng</th>
                    <th>Ngày hết hạn</th>
                    <th>Giá trị giảm</th>
                    <th>Điều kiện</th>
                    <th>Hành động</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($coupons as $coupon)
                    <tr>
                        <td>{{ $coupon->name }}</td>
                        <td>{{ $coupon->code }}</td>
                        <td>{{ $coupon->quantity }}</td>
                        <td>{{ date('d/m/Y', strtotime($coupon->expire_date)) }}</td>
                        <td>{{ $coupon->type == 1 ? $coupon->value.'%' : number_format($coupon->value,0).'đ' }}</td>
                        <td>{{ 'Đơn hàng > '.number_format($coupon->total_order,0).'đ' }}</td>
                        <td>
                          <a href="buyer/edit-coupon/{{ $coupon->id }}"><i class="nav-icon fas fa-pen"></i></a>
                            <a href="buyer/remove-coupon/{{ $coupon->id }}"><i class="nav-icon fas fa-trash" style="margin-left: 10px"></i></a>
                        </td>
                    </tr>
                    @endforeach
                  </tbody>

                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

@section('script')
<script src="admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="admin/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="admin/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="admin/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="admin/plugins/jszip/jszip.min.js"></script>
<script src="admin/plugins/pdfmake/pdfmake.min.js"></script>
<script src="admin/plugins/pdfmake/vfs_fonts.js"></script>
<script src="admin/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="admin/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="admin/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="admin/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="admin/dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
</script>
@endsection
@endsection