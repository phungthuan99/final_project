<!doctype html>
<html lang="en">

    <head>

        <meta charset="utf-8" />
        <base href="{{ asset('/') }}">
        <title>@yield('title')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesdesign" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <link rel="stylesheet" href="dist/css/adminlte.min.css">
        <link rel="stylesheet" href="dist/css/bootstrap.min.css">
        <script src="dist/js/bootstrap.min.js"></script>
        <!-- jquery.vectormap css -->
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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        {{-- Profile --}}
        <link rel="stylesheet" href="/css/profile.css" type="text/css">

    </head>

    <body style="" data-sidebar="dark">

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
                                    <img class="rounded-circle header-profile-user" src="/storage/{{Auth::guard('student')->user()->avatar}}"
                                        alt="Header Avatar">
                            <span class="d-none d-xl-inline-block ml-1">{{Auth::guard('student')->user()->fullname}}</span>
                                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                                </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <!-- item-->
                            <a class="dropdown-item" href="{{route('student.profile',[Auth::guard('student')->user()->id])}}"><i class="ri-user-line align-middle mr-1"></i>Hồ sơ</a>
                                <a class="dropdown-item d-block" href="{{route('student-password.edit',[Auth::guard('student')->user()->id])}}"><i class="ri-settings-2-line align-middle mr-1"></i>Đổi mật khẩu</a>
                                <a class="dropdown-item text-danger" href="{{ route('student.logout') }}"><i class="ri-shut-down-line align-middle mr-1 text-danger"></i>Đăng xuất</a>
                            </div>
                        </div>

                    </div>
                </div>
            </header>
