    @extends('admin.layout.master')
    @section('title', 'Danh sách cửa hàng')
    @section('style')
        <link rel="stylesheet"
            href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
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
                            <h1>Danh sách cửa hàng</h1>
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
                                                <th>Tên</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Địa chỉ</th>
                                                <th>Thành phố</th>
                                                <th>Quận</th>
                                                <th>Phường</th>
                                                <th>Trạng thái</th>
                                                <th>Hành động</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($shops as $shop)
                                                <tr>
                                                    <td>{{ $shop->name }}</td>
                                                    <td>{{ $shop->email }}</td>
                                                    <td>{{ $shop->phone }}</td>
                                                    <td>{{ $shop->address }}</td>
                                                    <td>{{ $shop->getCity->name }}</td>
                                                    <td>{{ $shop->getDistrict->name }}</td>
                                                    <td>{{ $shop->getWard->name }}</td>
                                                    @if ($shop->status == 'Chờ xác nhận')
                                                        <td class="text-warning">{{ $shop->status }}</td>
                                                    @elseif($shop->status == 'Đã xác nhận')
                                                        <td class="text-info">{{ $shop->status }}</td>
                                                    @elseif($shop->status == 'Đã khoá')
                                                        <td class="text-danger">{{ $shop->status }}</td>
                                                    @endif
                                                    <td>
                                                        <a href="admin/edit-shop/{{ $shop->id }}"><i
                                                                class=" fas fa-pen"></i></a>

                                                        {{-- <a href="admin/show-shop/{{ $shop->id }}"><i
                                                                style="margin-left: 20px" class="fas fa-eye"></i></a> --}}

                                                        <a href="admin/remove-shop/{{ $shop->id }}"><i
                                                                class=" fas fa-trash"
                                                                style="margin-left: 20px; color: red"></i></a>

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
