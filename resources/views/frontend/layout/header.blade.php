<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Final Project</title>
    <!-- Plugin -->
    <link rel="stylesheet" href="/plugins/bootstrap4/bootstrap.min.css">
    <link rel="stylesheet" href="/plugins/box/jquery.fancybox.min.css">
    <link rel="stylesheet" href="/plugins/carousel/owl.carousel.min.css">
    <link rel="stylesheet" href="/plugins/carousel/owl.theme.default.min.css">
    <link rel="stylesheet" href="/plugins/animation/animate.css">

    <!-- Icon -->
    <link rel="stylesheet" href="/plugins/fontawesome/css/font-awesome.css">

    <!-- CSS -->
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="dist/css/notification.css">
</head>

<body>
    <div class="wrapper">
        <!-- Start Header-->

        <header class="header">
            <div class="header__top">
                <div class="container">
                    <div class="header__top-inner d-flex align-items-center justify-content-between">
                        <div class="header__top-info d-flex align-items-center">
                        @foreach($settings as $setting)
                            <p class="header__top-welcome">{{$setting->slogan}}</p>
                            <a href="mailto:{{$setting->email}}" class="header__top-email"><i class="fa fa-envelope-o"></i>{{$setting->email}}</a>
                            <a href="tel:{{$setting->phone}}" class="header__top-phoneNumber"><i class="fa fa-phone"></i>{{$setting->phone}}</a>
                        @endforeach
                        </div>
                        <div class="">
                            <a style="color:#c8bee3" class="mr-2" href="{{route('home.teacher')}}">Giảng viên</a>
                            <a style="color:#c8bee3"  class="mr-2" href="/admin">Nhân viên</a>
                            <a style="color:#c8bee3" class="" href="{{route('home.student')}}">Học viên</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header__main d-flex">
                <div class="container">
                    <div class="header__main-inner d-flex align-items-center justify-content-between h-100">
                        <div class="header__logo">
                        @foreach($settings as $setting)
                            <a href="/">
                                <img src="/storage/{{$setting->logo}}" alt="logo">
                            </a>
                        @endforeach
                        </div>
                        <nav class="header__menu">
                            <ul class="header__menu-list d-flex">
                                <li class="header__menu-item"><a href="/" class="item-link active">Trang chủ</a></li>
                                <li class="header__menu-item"><a href="{{route('home.about')}}" class="item-link">Giới Thiệu</a></li>
                                <li class="header__menu-item"><a href="{{route('schedule-opening.index')}}" class="item-link">Lịch khai giảng</a></li>
                                <li class="header__menu-item"><a href="/news" class="item-link">Tin tức</a></li>
                                <li class="header__menu-item"><a href="{{route('enrollment.getForm')}}" class="item-link">Đăng ký học</a></li>
                            </ul>
                        </nav>
                        <div class="hamburger">
                            <i class="fa fa-bars"></i>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- End Header -->