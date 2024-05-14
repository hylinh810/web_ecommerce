@extends('admin.layout.master')
@section('title','Cập nhập blog')
@section('style')
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="admin/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="admin/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="admin/plugins/summernote/summernote-bs4.min.css">
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

                <h3 class="card-title">Cập nhập blog</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="admin/edit-blog/{{$blog->id}}" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Tiêu đề</label>
                    <input type="text" minlength="5" class="form-control" name="title" required value="{{ $blog->title }}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Nội dung ngắn</label>
                    <textarea minlength="5" class="form-control" name="scontent" required>{{ $blog->scontent }}</textarea>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Nội dung tin tức</label>
                    <textarea type="text" minlength="5" class="form-control" id="summernote" name="content" required>{{ $blog->content }}</textarea>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputFile">Ảnh bìa</label>
                    <img id="thumb" src="front/blog/{{ $blog->thumb }}" style="width: 200px;margin-left: 10px;" />
                  </div>

                  <div class="form-group">
                    <label for="exampleInputFile">Chọn ảnh bìa</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input onchange="document.getElementById('thumb').src = window.URL.createObjectURL(this.files[0])" type="file" accept="image/*" class="custom-file-input" name="image" id="image">
                        <label class="custom-file-label" for="image1">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" {{ $blog->published == 1 ? 'checked' : '' }} id="published" type="checkbox" name="published">
                        <label for="published" class="custom-control-label">Hiển thị</label>
                    </div>
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
<script src="admin/plugins/summernote/summernote-bs4.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="admin/dist/js/demo.js"></script>
<script>
    $(function () {
      // Summernote
      $('#summernote').summernote({height: '200px'});
    });
    $(function () {
        bsCustomFileInput.init();
    });
</script>

@endsection
@endsection