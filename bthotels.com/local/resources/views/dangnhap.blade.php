<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="">
    <title>Đăng nhập</title>
    <base href="{{asset('')}}">
    <!-- Bootstrap Core CSS -->
    
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container" style="padding-top: 100px;">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading" style="background-color: rgba(0, 0, 255, 0.75);">
                        <h3 class="panel-title" style="color: white;">Đăng nhập</h3>
                    </div>
                    @if(count($errors)>0)
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $err)
                        <span class="glyphicon glyphicon-remove"></span>
                        {{$err}}<br>
                        @endforeach
                    </div>
                    @endif
                    @if(session('thongbao'))
                    <div class="alert alert-danger">
                        <span class=" glyphicon glyphicon-remove"></span>
                        {{session('thongbao')}}
                    </div>
                    @endif
                    <div class="panel-body">
                        <form role="form" action="dangnhap" method="POST">
                            <fieldset>
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <div class="form-group">
                                    <input class="form-control" placeholder="Mã tài khoản" name="Matk" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Mật khẩu" name="Matkhau" type="password">
                                </div>
                                <button type="submit" class="btn btn-lg btn-success btn-block">Đăng nhập</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>