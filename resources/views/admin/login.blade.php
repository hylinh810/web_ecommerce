<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">

    <title>Login Admin</title>
  </head>
  <body>
    <section class="form-01-main">
      <div class="form-cover">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
                <div class="form-sub-main">
                    
                    <div class="_main_head_as">
                        <a href="#">
                        <img src="assets/images/vector.png">
                        </a>
                    </div>
                    <form action="login" method="POST">
                        @csrf
                        <div class="form-group">
                            @if(Session::has('erroradmin'))
                             <span class="alert alert-danger">{{ Session::get('erroradmin') }}</span>
                            @endif
                            <input id="email" name="email" class="form-control _ge_de_ol" type="email" placeholder="Enter Email" required="" aria-required="true">
                        </div>

                        <div class="form-group">                                              
                            <input id="password" type="password" class="form-control" name="password" placeholder="********" required="required">
                        </div>

                        <div class="form-group">
                            <div class="btn_uy">
                                <button type="submit"><span>Đăng nhập</span></button>
                            </div>
                        </div>
                    </form>
                </div>
          </div>
        </div>
      </div>
      </div>
    </section>
  </body>
</html>