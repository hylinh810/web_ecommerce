@extends('admin.layout.master')
@section('title','Cập nhập sản phẩm')
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

                <h3 class="card-title">Cập nhập sản phẩm</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="admin/edit-product/{{ $product->id }}" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Tên sản phẩm</label>
                    <input type="text" minlength="5" class="form-control" id="exampleInputEmail1" name="product_name" value="{{ $product->product_name }}" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Danh mục</label>
                    <select required name="cate_id" class="custom-select">
                        <option disabled>----Chọn danh mục----</option>
                        @foreach($categories as $category)
                        <option {{ $product->cate_id == $category->id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Mô tả ngắn</label>
                    <textarea minlength="5" class="form-control" name="sdescription" required>{{ $product->sdescription }}</textarea>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Mô tả sản phẩm</label>
                    <textarea type="text" minlength="5" class="form-control" id="summernote" name="description" required>{{ $product->description }}</textarea>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputFile">Hình ảnh</label>
                    <img id="img1" src="front/img/{{ $product->productImage[0]->path }}" style="width: 200px;margin-left: 10px;" />
                    <img id="img2" src="front/img/{{ $product->productImage[1]->path }}" style="width: 200px;margin-left: 10px;" />
                    <img id="img3" src="front/img/{{ $product->productImage[2]->path }}" style="width: 200px;margin-left: 10px;" />
                    <input type="hidden" id="oimg1" name="old_image1" value="{{ $product->productImage[0]->path }}" />
                    <input type="hidden" id="oimg2" name="old_image2" value="{{ $product->productImage[1]->path }}" />
                    <input type="hidden" id="oimg3" name="old_image3" value="{{ $product->productImage[2]->path }}" />
                  </div>

                  <div class="form-group">
                    <label for="exampleInputFile">Ảnh 1</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input onchange="document.getElementById('img1').src = window.URL.createObjectURL(this.files[0])" type="file" accept="image/*" class="custom-file-input" name="image1" id="image1"  >
                        <label class="custom-file-label" for="image1">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputFile">Ảnh 2</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input onchange="document.getElementById('img2').src = window.URL.createObjectURL(this.files[0])" type="file" accept="image/*" class="custom-file-input" name="image2" id="image2" >
                        <label class="custom-file-label" for="image2">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputFile">Ảnh 3</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input onchange="document.getElementById('img3').src = window.URL.createObjectURL(this.files[0])" type="file" accept="image/*" class="custom-file-input" name="image3" id="image3" >
                        <label class="custom-file-label" for="image3">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleInputEmail1">Giá tiền</label>
                    <input type="number" minlength="5" class="form-control" id="exampleInputEmail1" value="{{ $product->price }}" name="price" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Giá khuyến mãi</label>
                    <input type="number" minlength="5" class="form-control" id="exampleInputEmail1" value="{{ $product->discount }}" name="discount">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Tồn kho</label>
                    <input type="number" minlength="5" class="form-control" id="exampleInputEmail1" value="{{ $product->stocks }}" name="stocks" required>
                  </div>
                  <div class="form-group">
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" {{ $product->featured == 1 ? 'checked' : '' }} id="featured" type="checkbox"  name="featured">
                        <label for="featured" class="custom-control-label">Sản phẩm nổi bật</label>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" id="published" {{ $product->published == 1 ? 'checked' : '' }} type="checkbox" name="published">
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