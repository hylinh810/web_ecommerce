@extends('buyer.layout.master')
@section('title', 'Danh sách đơn hàng')
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
                        <h1>Danh sách đơn hàng</h1>
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
                                            <th>Mã đơn hàng</th>
                                            <th>Người đặt hàng</th>
                                            <th>Ngày đặt hàng</th>
                                            <th>Tổng tiền</th>
                                            <th>Thanh toán</th>
                                            <th>Trạng thái</th>
                                            <th>Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders as $order)
                                            <tr>
                                                <td>{{ $order->order_code }}</td>
                                                <td>{{ $order->user->name }}</td>
                                                <td>{{ date('H:m:i, d/m/Y', strtotime($order->order_date)) }}</td>
                                                <td>{{ number_format($order->total, 0) }}đ</td>
                                                @if ($order->paid == 0)
                                                    <td class="text-danger">Chưa thanh toán</td>
                                                @else
                                                    <td class="text-success">Đã thanh toán</td>
                                                @endif

                                                @if ($order->status == 'Chờ xác nhận')
                                                    <td class="text-info">{{ $order->status }}</td>
                                                @elseif($order->status == 'Đã xác nhận')
                                                    <td class="text-success">{{ $order->status }}</td>
                                                @elseif($order->status == 'Đang giao hàng')
                                                    <td class="text-warning">{{ $order->status }}</td>
                                                @else
                                                    <td class="text-success">{{ $order->status }}</td>
                                                @endif
                                                <td>
                                                    <a href="buyer/edit-order/{{ $order->id }}"><i
                                                            class=" fas fa-pen"></i></a>

                                                    <a href="buyer/show-order/{{ $order->id }}"><i
                                                            style="margin-left: 20px" class="fas fa-eye"></i></a>
                                                    @if ($order->status == 'Đã giao hàng')
                                                        <a href="buyer/remove-order/{{ $order->id }}"><i
                                                                class=" fas fa-trash" style="margin-left: 20px"></i></a>
                                                    @endif
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
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>
@endsection
@endsection
