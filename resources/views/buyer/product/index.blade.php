@extends('buyer.layout.master')
@section('title','Danh sách sản phẩm')
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
            <h1>Danh sách sản phẩm</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          @if(Session::has('danger'))
            <div class="col-md-12 alert alert-danger">
                <span>{{ Session::get('danger') }}</span>
            </div>
          @endif
          <div class="col-12">
            <!-- /.card -->

            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Ảnh</th>
                    <th>Tên sản phẩm</th>
                    <th>Giá tiền</th>
                    <th>Tồn kho</th>
                    <th>Nổi bật</th>
                    <th>Hiển thị</th>
                    <th>Hành động</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($products as $product)
                    <tr>
                        <td><img style="width: 100px" src="front/img/{{ $product->productImage[0]->path }}" /></td>
                        <td>{{ $product->product_name }}</td>
                        <td>{{ number_format($product->price,0) }}đ</td>
                        <td>{{ $product->stocks }}</td>

                        @if($product->featured == 1)
                        <td><a href="buyer/update-featured-product/{{ $product->id }}"><i style="color: green" class="fas fa-check"></i></a></td>
                        @else
                        <td><a href="buyer/update-featured-product/{{ $product->id }}"><i style="color: red" class="fas fa-times"></i></a></td>
                        @endif

                        @if($product->published == 1)
                        <td><a href="buyer/update-published-product/{{ $product->id }}"><i style="color: green" class="fas fa-eye"></i></a></td>
                        @else
                        <td><a href="buyer/update-published-product/{{ $product->id }}"><i style="color: red" class="fas fa-eye-slash"></i></a></td>
                        @endif
                        <td>
                          <a href="buyer/edit-product/{{ $product->id }}"><i class="nav-icon fas fa-pen"></i></a>
                            <a href="buyer/remove-product/{{ $product->id }}"><i class="nav-icon fas fa-trash" style="margin-left: 10px;color: red"></i></a>
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
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
</script>
@endsection
@endsection