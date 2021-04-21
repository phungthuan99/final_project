<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <base href="{{ asset('/') }}">
    <title>@yield('title')</title>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- overlayScrollbars -->
     {{-- <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css"> --}}
    <!-- Theme style -->

    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <link rel="stylesheet" href="dist/css/bootstrap.min.css">
    <script src="dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>

    <link rel="stylesheet" href="/css/toggle.css">
    {{-- New css --}}

    <link href="/plugins/jquery.vectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />

    <!-- DataTables -->
    <link href="/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="/plugins/datatables-responsive/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <!-- Bootstrap Css -->
    <link href="/plugins/bootstrap4/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
    <!-- Profile css -->
    <link rel="stylesheet" href="/css/profile.css" type="text/css">
    <!-- Sweet alert css -->
    <link href="/plugins/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />

    <!-- CK EDITOR -->
    <style>
        select.form-control{
            height:auto!important;
        }
    </style>
</head>
<body data-sidebar="dark" style="background-color: #f1f5f7;">

    <!-- Begin page -->
    <div id="layout-wrapper">

        <header id="page-topbar">
            <div class="navbar-header">
                <div class="d-flex">
                    <!-- LOGO -->
                    <div class="navbar-brand-box">
                        <a style="color:white" href="/admin" class="logo logo-dark">

                            <span class="logo-lg">
                                    EDUSPACE
                                </span>
                        </a>

                        <a style="color:white" href="/admin" class="logo logo-light">

                            <span class="logo-lg">
                                EDUSPACE
                                </span>
                        </a>
                    </div>

                    <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                            <i class="ri-menu-2-line align-middle"></i>
                        </button>

                </div>

                <div class="d-flex">

                    <div class="dropdown d-inline-block d-lg-none ml-2">
                        <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="ri-search-line"></i>
                            </button>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0" aria-labelledby="page-header-search-dropdown">

                            <form class="p-3">
                                <div class="form-group m-0">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search ...">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="submit"><i class="ri-search-line"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="dropdown d-inline-block user-dropdown">
                        <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="rounded-circle header-profile-user" src="/storage/{{Auth::user()->avatar}}"
                                    alt="Header Avatar">
                        <span class="d-none d-xl-inline-block ml-1">{{Auth::user()->fullname}}</span>
                                <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                            </button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <!-- item-->
                            <a class="dropdown-item" href="{{route('account.show',[Auth::user()->id])}}"><i class="ri-user-line align-middle mr-1"></i>Hồ sơ</a>
                            <a class="dropdown-item d-block"  href="{{route('password.edit',[Auth::user()->id])}}"><i class="ri-settings-2-line align-middle mr-1"></i>Đổi mật khẩu</a>
                            <a class="dropdown-item text-danger" href="{{ route('auth.logout') }}"><i class="ri-shut-down-line align-middle mr-1 text-danger"></i>Đăng xuất</a>
                        </div>
                    </div>

                </div>
            </div>
        </header>
