<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <!-- Plugin -->
    <link rel="stylesheet" href="/plugins/bootstrap4/bootstrap.min.css">

    <!-- Icon -->
    <link rel="stylesheet" href="/plugins/fontawesome/css/font-awesome.css">

    <!-- CSS -->
    <link rel="stylesheet" href="/css/style.css">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;600;700&display=swap"
        rel="stylesheet">
</head>

<body>
    <div class="wrapper">

        <!-- Start Login -->
        <div class="login">
            <div class="login__overlay">
            </div>
            <div class="container h-100">
                <div class="d-flex align-items-center justify-content-center h-100">
                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="login__form">
                            <p class="login__form-title">Nhập vào email để lấy lại mật khẩu</p>
                            <form action="{{route('post.studentforgotpassword')}}" method="POST">
                                @csrf
                                <input class="login__form-input" type="text" name="email" value="{{old('email')}}" placeholder="Email">
                                
                                {!! ShowErrors($errors,'email') !!}
                                @if(session()->has('success'))
                                <div class="alert alert-success">
                                    {{ session()->get('success') }}
                                </div>
                                @elseif(session()->has('danger'))
                                <div class="alert alert-danger">
                                    {{ session()->get('danger') }}
                                </div>
                                @endif
                                <button type="submit" style="" class="btn login__form-btn">Xác nhận</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Login -->
    </div>

    <!-- Javascript -->
    <script src="/js/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>