@extends('admin.layout.master')
@section('title','Cập nhập shipper')
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

                <h3 class="card-title">Cập nhập người giao hàng</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="admin/edit-shipper/{{ $shipper->id }}" method="POST">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Họ và tên</label>
                    <input type="text" minlength="5" class="form-control" id="exampleInputEmail1" name="name" required value="{{ $shipper->name }}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Số điện thoại</label>
                    <input type="tel" minlength="10" maxlength="10" class="form-control" id="exampleInputPassword1" name="phone" required value="{{ $shipper->phone }}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Địa chỉ</label>
                    <input type="text" minlength="5" class="form-control" id="exampleInputPassword1" name="address" required value="{{ $shipper->address }}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Thành phố</label>
                    <select required name="city" id="city" class="choose-city custom-select">
                        <option disabled>----Chọn tỉnh thành phố----</option>
                        @foreach($cities as $city)
                            <option {{ $shipper->city == $city->id ? 'selected' : '' }} value="{{ $city->id }}">{{ $city->name }}</option>
                        @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Quận Huyện</label>
                    <select required name="district" id="district" class="choose-district custom-select">
                        <option value="{{ $shipper->getdistrict->id }}">{{ $shipper->getdistrict->name }}</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Phường xã</label>
                    <select required name="ward" id="ward" class="choose-ward custom-select">
                        <option value="{{ $shipper->getward->id }}">{{ $shipper->getward->name }}</option>
                    </select> 
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
<script>
  $('.choose-city').on('change',function(){
      var city_id = $(this).val();
      
      $.ajax({
          url: "ajax/load-district",
          type: "GET",
          data: {
              city_id: city_id
          },
          success: function (data) {
              $('.choose-district').html(data);
          },
          error: function () {
              alert("Lỗi");
          },
      });
  });

  $('.choose-district').on('change',function(){
      var district_id = $(this).val();
      $.ajax({
          url: "ajax/load-ward",
          type: "GET",
          data: {
              district_id: district_id
          },
          success: function (data) {
              $('.choose-ward').html(data);
          },
          error: function () {
              alert("Lỗi");
          },
      });
  });

</script>
<!-- Page specific script -->
@endsection
@endsection