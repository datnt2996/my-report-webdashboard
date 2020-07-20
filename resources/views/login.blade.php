<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel=icon href="{{asset('image/Logo.png')}}" sizes="57x57" type="image/png">
    <title>Đăng nhập Administartor Tstudents</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <!-- <link href="{{asset('css/metisMenu.min.css')}}" rel="stylesheet"> -->

    <!-- Custom CSS -->
    <link href="{{asset('css/login.css')}}" rel="stylesheet" type="text/css">

    <!-- Custom Fonts -->
    <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
</head>

<body>
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-form-title" style="background-image: asset('image/login.jpg')">
                    <span class="login100-form-title-1">
                        Đăng Nhập
                    </span>
                </div>

                <form class="login100-form validate-form" role="form" method="POST" action="{{url('login')}}">
                    @if($errors->has('user'))
                    <p style="color: red">{{$errors->first('user')}}</p>
                    @endif
                    <div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
                        <span class="label-input100">Email</span>
                        <input class="input100" type="text" placeholder="Nhập email" id="user" name="user" type="text" autofocus>
                    </div>
                    @if($errors->has('password'))
                    <p style="color: red">{{$errors->first('password')}}</p>
                    @endif
                    <div class="wrap-input100 validate-input m-b-18" data-validate="Password is required">
                        <span class="label-input100">Mật khẩu</span>
                        <input class="input100" placeholder="Nhập mật khẩu" id="password" name="password" type="password" value="">
                    </div>
                    @if($errors->has('errorLogin'))
                    <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <p>{{$errors->first('errorLogin')}}</p>
                    </div>
                    @endif
                    <div class="remember">
                        <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember">
                        <label class="label-checkbox100" for="ckb1">
                            Nhớ mật khẩu
                        </label>
                    </div>
                    @csrf
                    <div class="container-login100-form-btn">
                        <button type="submit" class=" login100-form-btn">Đăng nhập</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="{{asset('js/jquery.min.js')}}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{asset('js/bootstrap.min.js')}}"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="{{asset('js/metisMenu.min.js')}}"></script>

    <!-- Custom Theme JavaScript -->
    <script src="{{asset('js/startmin.js')}}"></script>
</body>

</html>